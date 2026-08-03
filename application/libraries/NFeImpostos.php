<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'vendor/autoload.php';
require_once 'application/traits/Traits.php';

/**
 * Class NFeImpostos
 * Classe responsável por calcular o valor dos impostos dos itens
 * Alterar *somente* em caso de mudança na legislaçao ou caso especifico
 * Parametrização de alíquotas deve ser implementados na camada anterior
 */
class NFeImpostos
{
    use Traits;

    private $_CI;

    public function __construct()
    {
        $this->_CI = &get_instance();
    }

    /**
     * Atualiza valores individuais do item com base na CST do ICMS
     * @param $item
     */
    public function defineICMS($item)
    {
        //ICMS
        $natureza = $this->_CI->naturezaOperacao->getById($item->nota_natureza_operacao_id);
        $vBCIcms = self::calculateValorBaseCalculoICMS($item, $natureza);

        $itemAtualizado = [];
        switch ($item->icms_cst) {
            case '00':
                $itemAtualizado['icms_vbc'] = $vBCIcms;
                $itemAtualizado['icms_vicms'] = self::calculateFromPercentage($vBCIcms, $item->icms_picms);
                break;
            case '10'://Tributada e com cobrança do ICMS por substituição tributária
                $itemAtualizado['icms_vbc'] = $vBCIcms;
                $itemAtualizado['icms_vicms'] = self::calculateFromPercentage($vBCIcms, $item->icms_picms);
                break;
            case '20'://Tributação com redução de base de cálculo
                $vBCIcms = self::calculateFromPercentage($vBCIcms, $natureza->p_red_bc);
                $itemAtualizado['icms_vbc'] = $vBCIcms;
                $itemAtualizado['icms_vicms'] = self::calculateFromPercentage($vBCIcms, $item->icms_picms);
                $itemAtualizado['icms_pred_bc'] = $natureza->p_red_bc;
                $itemAtualizado['icms_vicmsdeson'] = null;
                break;
            case '40':
            case '41':
            case '50':
                $itemAtualizado['icms_vbc'] = null;
                $itemAtualizado['icms_vicms'] = null;
                $itemAtualizado['icms_vicmsdeson'] = null;
                //Não existe essa tag no manual para estas CSTs, caso o usuário tenha deixado preenchida é preciso limpar
                $itemAtualizado['icms_mod_bc'] = null;
                //Calcula icms desonerado caso tenha sido informado o motivo da desoneração
                if ($item->icms_mot_des_icms) {
                    $itemAtualizado['icms_vicmsdeson'] = self::calculateFromPercentage($vBCIcms, $item->icms_picms);
                }
                break;
            case '51':
                $itemAtualizado['icms_vbc'] = $vBCIcms;
                $itemAtualizado['icms_vicmsdeson'] = null;
                $itemAtualizado['icms_vicms_op'] = self::calculateFromPercentage($vBCIcms, $item->icms_picms);
                $itemAtualizado['icms_vicms_dif'] = self::calculateFromPercentage($item->icms_vicms_op, $item->icms_picms_dif);
                $vICMS = round((float)$item->icms_vicms_op, 2) - round((float)$itemAtualizado['icms_vicms_dif'], 2);
                $itemAtualizado['icms_vicms'] = $vICMS;
                break;
            case '60':
                //vBC === vBCSTRet
                $itemAtualizado['icms_vbcstret'] = 0;
                //pICMS === pST
                $itemAtualizado['icms_pst'] = 0;
                //vICMS == =vICMSSubstituto
                $itemAtualizado['icms_vicms_substituto'] = 0;
                //vICMS === vICMSSTRet
                $itemAtualizado['icms_vicms_stret'] = 0;
                $itemAtualizado['icms_pred_bcefet'] = 0;
                $itemAtualizado['icms_vbcefet'] = 0;
                $itemAtualizado['icms_picms_efet'] = 0;
                $itemAtualizado['icms_vicms_efet'] = 0;
                break;
            case '70'://Tributação ICMS com redução de base de cálculo e cobrança do ICMS por substituição tributária
                if ($natureza->p_red_bc > 0) {
                    $vBCIcms = $vBCIcms - self::calculateFromPercentage($vBCIcms, $item->p_red_bc);
                }
                $itemAtualizado['icms_vbc'] = $vBCIcms;
                $itemAtualizado['icms_vicms'] = self::calculateFromPercentage($vBCIcms, $item->icms_picms);
                break;

            /**
             * ICMS 90
             * Preencher manualmente na edição do item da nota
             */
            case '90':
                //Caso o $item->getIcmsVBC() não tenha sido informado e a valor da BC do ICMS calculada for inválida (!0) e
                //Se percentual icms for informado ou o valor do icms for informado
                if (($item->icms_picms || $item->icms_vicms)
                    && ((null === $vBCIcms || $vBCIcms <= 0) && !$item->icms_vbc)) {
                    $itemAtualizado['icms_vbc'] = $vBCIcms;
                }

                //Campo será preenchido quando o campo vICMSDeson estiver preenchido cfm manual sefaz
                if (empty($item->icms_vicmsdeson)) {
                    $itemAtualizado['icms_mot_des_icms'] = null;
                }
        }

        /**
         * Suspenção ICMS
         * Utilzado em notas de fornecedor operação triangular por exemplo, nota foi enviada para produção em outro
         * fornecedor e vai voltar para o emissor
         */
        if ($natureza->icms_suspenso) {
            $itemAtualizado['icms_mod_bc'] = null;
            $itemAtualizado['icms_picms'] = null;
            $itemAtualizado['icms_picms_dif'] = null;
            $itemAtualizado['icms_vbc'] = null;
            $itemAtualizado['icms_vicms'] = null;
            $itemAtualizado['icms_vicmsdeson'] = null;
            $itemAtualizado['icms_vicms_op'] = null;
            $itemAtualizado['icms_vicms_dif'] = null;
        }

        //Atualiza item
        if($itemAtualizado != null)
            $this->_CI->faturamentoNotaFiscalItem->update($item->id, $itemAtualizado);
    }

    /**
     * Atualiza valores individuais do item com base na CSOSN do ICMSSN
     * @param $item
     */
    public function defineICMSSN($item)
    {
        //ICMS
        //$natureza = $this->_CI->naturezaOperacao->getById($item->nota_natureza_operacao_id);
        $vBCIcmsST = self::calculateValorBaseCalculoICMSST($item);

        $itemAtualizado = [];
        switch ($item->icms_csosn) {
            case '101':
                $itemAtualizado['icms_pcred_sn'] = $item->icms_pcred_sn;
                $itemAtualizado['icms_vcred_icms_sn'] = self::calculateFromPercentage($vBCIcmsST, $item->icms_pcred_sn);
                //print_r($item->cod_produto . " - " . $item->icms_pcred_sn . " " . $vBCIcmsST . " | ");
                break;
            case '102':
            case '103':
            case '300':
            case '400':
                break;
            case '201':
                //vICMS
                $vICMS = self::calculateFromPercentage($vBCIcmsST, $item->icms_picms_st);
                $pMVAST = self::calculateFromPercentage($vBCIcmsST, $item->icms_pmvast);
                $pRedBC = self::calculateFromPercentage($vBCIcmsST, $item->icms_pred_bcst);
                $vBCIcmsST = $vBCIcmsST + $pMVAST - $pRedBC;

                $itemAtualizado['icms_vbcst'] = $vBCIcmsST;
                $itemAtualizado['icms_vicms_st'] = abs($vICMS -
                                                       self::calculateFromPercentage($vBCIcmsST, $item->icms_picms_st));

                //Grupo opcional. (Incluído na NT2016.002)
                $itemAtualizado['icms_vbcfcpst'] = null;
                $itemAtualizado['icms_pcred_sn'] = null;
                $itemAtualizado['icms_vcred_icms_sn'] = null;
                if ($item->icms_pfcpst &&
                    $item->icms_pcred_sn) {//Continua caso tenha sido informado fundo de combate a pobreza
                    $itemAtualizado['icms_vbcfcpst'] = $vBCIcmsST;
                    $itemAtualizado['icms_vfcpst'] = self::calculateFromPercentage($vBCIcmsST, $item->icms_pfcpst);
                    $itemAtualizado['icms_pcred_sn'] = $item->icms_pcred_sn;
                    $itemAtualizado['icms_vcred_icms_sn'] = self::calculateFromPercentage($vBCIcmsST, $item->icms_pcred_sn);
                }
                break;
            case '202':
            case '203':
                $vICMS = self::calculateFromPercentage($vBCIcmsST, $item->icms_picms_st);
                $pMVAST = self::calculateFromPercentage($vBCIcmsST, $item->icms_pmvast);
                $pRedBC = self::calculateFromPercentage($vBCIcmsST, $item->icms_pred_bcst);
                $vBCIcmsST = $vBCIcmsST + $pMVAST - $pRedBC;

                $itemAtualizado['icms_vbcst'] = $vBCIcmsST;
                $itemAtualizado['icms_vicms_st'] = abs($vICMS -
                                                       self::calculateFromPercentage($vBCIcmsST, $item->icms_picms_st));


                //Grupo opcional. (Incluído na NT2016.002)
                if ($item->icms_pfcpst) {//Continua caso tenha sido informado fundo de combate a pobreza
                    $itemAtualizado['icms_vbcfcpst'] = $vBCIcmsST;
                    $itemAtualizado['icms_vfcpst'] = self::calculateFromPercentage($vBCIcmsST, $item->icms_pfcpst);
                }
                break;
            case '500':
                //100% opcional
                $itemAtualizado['icms_vbcstret'] = null;
                $itemAtualizado['icms_pst'] = null;
                $itemAtualizado['icms_vicms_substituto'] = null;
                $itemAtualizado['icms_vicms_stret'] = null;

                //Grupo opcional. (Incluído na NT2016.002)
                $itemAtualizado['icms_vbcfcpst_ret'] = null;
                $itemAtualizado['icms_pfcpst_ret'] = null;
                $itemAtualizado['icms_vfcpst_ret'] = null;

                //Grupo opcional. (Incluído na NT2016.002)
                $itemAtualizado['icms_pred_bcefet'] = null;
                $itemAtualizado['icms_vbcefet'] = null;
                $itemAtualizado['icms_picms_efet'] = null;
                $itemAtualizado['icms_vicms_efet'] = null;
                break;

            /**
             * ICMSSN 900
             * Preencher manualmente na edição do item da nota
             */
            case '900':
//                //opcional 1
//                $itemAtualizado['icms_mod_bc'] = null;
//                $itemAtualizado['icms_vbc'] = null;
//                $itemAtualizado['icms_picms'] = null;
//                $itemAtualizado['icms_vicms'] = null;
//
//                //opcional 2
//                $itemAtualizado['icms_mod_bcst'] = null;
//                $itemAtualizado['icms_pmvast'] = null;
//                $itemAtualizado['icms_pred_bcst'] = null;
//                $itemAtualizado['icms_vbcst'] = null;
//                $itemAtualizado['icms_picms_st'] = null;
//                $itemAtualizado['icms_vicms_st'] = null;
//
//                //opcional 3 (Incluído na NT2016.002)
//                $itemAtualizado['icms_vbcfcpst'] = null;
//                $itemAtualizado['icms_pfcpst'] = null;
//                $itemAtualizado['icms_vfcpst'] = null;
//
//                //opcional 4
//                $itemAtualizado['icms_pcred_sn'] = null;
//                $itemAtualizado['icms_vcred_icms_sn'] = null;

                break;
        }
        //Atualiza item
        if($itemAtualizado != null)
            $this->_CI->faturamentoNotaFiscalItem->update($item->id, $itemAtualizado);
    }

    /**
     * Atualiza valores individuais do item com base na CST do IPI
     * @param $item
     */
    public function defineIPI($item)
    {
        $vBCIpi = $item->valor_total_produtos;
        $natureza = $this->_CI->naturezaOperacao->getById($item->nota_natureza_operacao_id);
        if (!$item->ipi_cst) {
            return;
        }
        $itemAtualizado = [];
        switch ($item->ipi_cst) {
            case 00:
            case 49:
            case 50:
                $itemAtualizado['ipi_vbc'] = $vBCIpi;
                $itemAtualizado['ipi_vipi'] = self::calculateFromPercentage($vBCIpi, $item->ipi_pipi);
                $itemAtualizado['ipi_qunid '] = null;
                $itemAtualizado['ipi_vunid '] = null;
                break;
            case 01:
            case 02:
            case 03:
            case 04:
            case 05:
            case 51:
            case 52:
            case 53:
            case 54:
            case 55:
                break;
            case 99:
                $itemAtualizado['ipi_vipi'] = 0;
                $itemAtualizado['ipi_qunid'] = 0;
                $itemAtualizado['ipi_vunid'] = 0;
                $itemAtualizado['ipi_vbc'] = null;
                $itemAtualizado['ipi_pipi'] = null;
                break;
        }
        if ($natureza->icms_suspenso) {
            $itemAtualizado['ipi_vbc'] = null;
            $itemAtualizado['ipi_vipi'] = null;
        }

        //Atualiza item
        if($itemAtualizado != null)
            $this->_CI->faturamentoNotaFiscalItem->update($item->id, $itemAtualizado);
    }

    /**
     * Atualiza valores individuais do item com base na CST do PIS
     * @param $item
     */
    public function definePIS($item)
    {
        $itemAtualizado = [];
        $natureza = $this->_CI->naturezaOperacao->getById($item->nota_natureza_operacao_id);
        $vBCIcms = self::calculateValorBaseCalculoPIS($item, $natureza);
        switch ($item->pis_cst) {
            case 01:
                $itemAtualizado['pis_vbc'] = $vBCIcms;
                $itemAtualizado['pis_vpis'] = self::calculateFromPercentage($vBCIcms, $item->pis_ppis);
                break;
            case 49:
            case 50:
            case 51:
            case 52:
            case 53:
            case 98:
            case 99:
                //utilizado em nota de devolução,
                //remessa para transporte
                //resarcimento de icms
                //estorno de credito
                //venda de energia
                //Percentual do pis nestes casos sempre foi 0, assim como os demais campos
                if ($item->pis_ppis > 0) {
                    $itemAtualizado['pis_vbc'] = $vBCIcms;
                    $itemAtualizado['pis_vpis'] = self::calculateFromPercentage($vBCIcms, $item->pis_ppis);
                } else {
                    $itemAtualizado['pis_vbc'] = null;
                    $itemAtualizado['pis_vpis'] = 0;//Obrigatório preencher
                    $itemAtualizado['pis_valiq_prod'] = 0;
                    $itemAtualizado['pis_qbc_prod'] = 0;
                }
                break;
        }

        //Atualiza item
        if($itemAtualizado != null)
            $this->_CI->faturamentoNotaFiscalItem->update($item->id, $itemAtualizado);
    }

    /**
     * Atualiza valores individuais do item com base na CST do COFINS
     * @param $item
     */
    public function defineCOFINS($item)
    {
        $natureza = $this->_CI->naturezaOperacao->getById($item->nota_natureza_operacao_id);
        $vBCIcms = self::calculateValorBaseCalculoCOFINS($item, $natureza);
        $itemAtualizado = [];
        switch ($item->cofins_cst) {
            case 01:
                $itemAtualizado['cofins_vbc'] = $vBCIcms;
                $itemAtualizado['cofins_vcofins'] = self::calculateFromPercentage($vBCIcms, $item->cofins_pcofins);
                break;
            case 49:
            case 50:
            case 51:
            case 52:
            case 53:
            case 98:
            case 99:
                //Mesmo caso do PIS
                if ($item->cofins_pcofins > 0) {
                    $itemAtualizado['cofins_vbc'] = $vBCIcms;
                    $itemAtualizado['cofins_vcofins'] = self::calculateFromPercentage($vBCIcms, $item->cofins_pcofins);
                } else {
                    $itemAtualizado['cofins_vbc'] = null;
                    $itemAtualizado['cofins_vcofins'] = 0;//Obrigatório preencher
                    $itemAtualizado['cofins_valiq_prod'] = 0;
                    $itemAtualizado['cofins_qbc_prod'] = 0;
                }
                break;
        }
        //Atualiza item
        if($itemAtualizado != null)
            $this->_CI->faturamentoNotaFiscalItem->update($item->id, $itemAtualizado);
    }

    /**
     * Calcula o valor base o item
     * @param $item
     * @param $natureza
     * @return float
     */
    private function calculateValorBaseCalculo($item, $natureza)
    {
        //Caso a opção converter icms em desconto da natureza seja = true não inclui demais cálculo normais
        //Este caso ocorre em destinatários da zona franca de manaus.
        if ($natureza->converter_icms_em_desconto) {
            return $item->valor_total_produtos;
        }
        //Demais casos
        return (float)$item->valor_total_produtos
               + $item->valor_seguro
               + $item->valor_despesas
               + $item->valor_frete
               - $item->valor_desconto;
    }

    /**
     * Retorna o valor base do ICMS
     * @param $item
     * @param $natureza
     * @return float
     */
    private function calculateValorBaseCalculoICMS($item, $natureza)
    {
        $vBC = $this->calculateValorBaseCalculo($item, $natureza);
        //Necessário calcular IPI para ter o valor da base do item
        if (true === $natureza->ipi_integra_vbcicms) {
            $this->defineIPI($item);
            return (float)$item->ipi_vipi + $vBC;
        }
        return $vBC;
    }

    /**
     * Valor da base do ICMSSN
     * @param $item
     * @return float
     */
    private function calculateValorBaseCalculoICMSST($item)
    {
        $vBC = (float)$item->valor_total_produtos
               + $item->valor_seguro
               + $item->valor_despesas
               + $item->valor_frete
               - $item->valor_desconto;

        return $vBC;
    }

    /**
     * Calcula valor base do PIS
     * @param $item
     * @param $natureza
     * @return float
     */
    public function calculateValorBaseCalculoPIS($item, $natureza)
    {
        $vBC = $this->calculateValorBaseCalculo($item, $natureza);
        #Exclusão do ICMS da base de cálculo do Pis e Cofins
        if ($natureza->pis_exclui_icms_vbc) {
            return ($vBC - $item->icms_vicms);
        }
        return $vBC;
    }

    /**
     * Calcula Valor base do COFINS
     * @param $item
     * @param $natureza
     * @return float
     */
    public function calculateValorBaseCalculoCOFINS($item, $natureza)
    {
        $vBC = $this->calculateValorBaseCalculo($item, $natureza);
        #Exclusão do ICMS da base de cálculo do Pis e Cofins
        if ($natureza->cofins_exclui_icms_vbc) {
            return ($vBC - $item->icms_vicms);
        }
        return $vBC;
    }
}
