<?php
declare(strict_types=1);

/**
 * Form options trait
 * @author giovani
 */
trait Traits
{

    /**
     * Current datetime
     * @return DateTime|null
     */
    public static function now(): ?DateTime
    {
        try {
            return new DateTime();
        } catch (\Exception $exception) {
            return null;
        }
    }

    /**
     * Converte money to db
     * @param string $value
     * @return string
     */
    public static function moneyToDB(string $value)
    {
        $decimals = explode(',', $value);
        $floatValue = (float)str_replace(['.', ','], ['', '.'], $value);
        return number_format((float) ($floatValue), strlen(end($decimals)), '.', '');
    }

    /**
     * @param mixed $value
     * @param int $decimals
     * @return string
     */
    public static function toReais($value, int $decimals = 2)
    {
        if (null === $value){
            $value = 0;
        }
        return number_format((float) ($value), $decimals, ',', '.');
    }

    public static function toWeight($value, int $decimals = 3)
    {
        return number_format((float) ($value), $decimals, '.', '.');
    }

    public static function toSefaz($value, int $decimals = 2)
    {
        return number_format((float) ((float)$value), $decimals, '.', '');
    }

    public static function toSefazOrNull($value, int $decimals = 2)
    {
        if ((float)$value <= 0) {
            return null;
        }
        return number_format((float) ((float)$value), $decimals, '.', '');
    }

    public static function reaisToFloat($valor)
    {
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", ".", $valor);
        return (float)$valor;
    }

    public static function multiply($a, $b)
    {
        return (float)$a * (float)$b;
    }

    /**
     * @param mixed $numero
     * @return string|string[]|null
     */
    public static function onlyNumbers($numero)
    {
        if (null === $numero){
            $numero = '';
        }
        return preg_replace("/[^0-9]/", "", $numero);
    }

    public static function onlyNumbersAndLetters($string)
    {
        if (null === $string){
            $string = '';
        }
        return preg_replace("/[^a-zA-Z0-9]/", "", $string);
    }

    public static function noDecimals($value)
    {
        $numero = number_format((float) ((float)$value), 0);
        return preg_replace("/[^0-9]/", "", $numero);
    }

    public static function twoDecimals($value)
    {
        return number_format((float) ((float)$value), 2, '.', '');
    }

    /**
     * @param mixed $value
     * @param int $limit
     * @return string
     */
    public static function cut($value, int $limit = 15)
    {
        if ($value && strlen($value) > $limit) {
            return mb_substr($value, 0, $limit);
        } else {
            return $value;
        }
    }

    public static function calculateFromPercentage($valueA, $valueB)
    {
        if (!$valueA || !$valueB) {
            return 0;
        }
        return ($valueA * $valueB) / 100;
    }

    public static function calculatePercentageDiscount($value, $percentageDiscount)
    {
        if (!$value || !$percentageDiscount) {
            return 0;
        }
        return $value - (($value * $percentageDiscount) / 100);
    }

    /**
     * Ex: 20,00, 150,00
     * (20/150) * 100
     */
    public static function getPercentageFromValues($minorValue, $majorValue)
    {
        if (!$minorValue || !$majorValue) {
            return 0;
        }
        return (($minorValue / $majorValue) * 100);
    }

    /**
     * @param string $data
     * @return DateTime|false
     */
    public static function dataSefazToObject(string $data)
    {
        return \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data);
    }

    public static function dataSefazToMySQLDateTime(string $data)
    {
        return \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data)->format('Y-m-d H:i:s');
    }

    public static function stringToDate(string $data, $format = 'd/m/Y')
    {
        return \DateTime::createFromFormat($format, $data);
    }

    public static function formatXML(string $xml)
    {
        $dom = new \DOMDocument();
        $dom->loadXML($xml);
        $dom->preserveWhiteSpace = FALSE;
        $dom->formatOutput = TRUE;
        return $dom->saveXML();
    }

    /**
     * @param string|array $message
     * @return string
     */
    public static function arrayToHtml($message): string
    {
        $string = '';
        $i = 1;
        if (!is_array($message)) {
            return '<strong>' . $message . '</strong><br/>';
        }
        foreach ($message as $key => $item) {
            $string .= $i . ' - <strong>' . $item . '</strong><br/>';
            $i++;
        }
        return $string;
    }

    public static function arrayFlatten($array)
    {
        $result = '';
        if (!is_array($array)) {
            return $result;
        }
        foreach ($array as $item) {
            if (is_array($item)){
                return self::arrayFlatten($item);
            }
            $result .= $item;
        }
        return $result;
    }

    public static function getStringBetween($string, $start, $end)
    {
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    public static function deleteAllBetween($string, $beginning, $end)
    {
        $beginningPos = strpos($string, $beginning);
        $endPos = strpos($string, $end);
        if ($beginningPos === false || $endPos === false) {
            return $string;
        }
        $textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);
        return str_replace($textToDelete, '', $string);
    }



    public static function removeAccents($value, $normalize = 'n')
    {
        $from = "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ";
        $to = "aaaaeeiooouucAAAAEEIOOOUUC";

        $keys = array();
        $values = array();
        preg_match_all('/./u', $from, $keys);
        preg_match_all('/./u', $to, $values);
        $mapping = array_combine($keys[0], $values[0]);
        $value = strtr($value, $mapping);
        if ($normalize == 'u') {
            $value = strtoupper(strtolower($value));
        }
        if ($normalize == 'l') {
            $value = strtolower($value);
        }
        return $value;
    }

    protected static function indicadorIE(): array
    {
        return [
            '1' => 'Contribuinte',
            '2' => 'Contribuinte Isento',
            '9' => 'Não Contribuinte',
        ];
    }

    protected static function indicadorConsumidorFinal(): array
    {
        return [
            '0' => 'Normal',
            '1' => 'Consumidor Final',
        ];
    }

    protected static function indicadorPresencial(): array
    {
        return [
            '0' => 'Não se aplica (por exemplo, Nota Fiscal complementar ou de ajuste);',
            '1' => 'Operação presencial',
            '2' => 'Operação não presencial, pela Internet',
            '3' => 'Operação não presencial, Teleatendimento',
            '4' => 'NFC-e em operação com entrega a domicílio',
            '5' => 'Operação presencial, fora do estabelecimento; (incluído NT 2016/002)',
            '9' => 'Operação não presencial, outros',
        ];
    }

    protected static function modBC(): array
    {
        return [
            '0' => 'Margem Valor Agregado (%)',
            '1' => 'Pauta (Valor)',
            '2' => 'Preço Tabelado Máx. (valor)',
            '3' => 'Valor da operação.',
        ];
    }

    protected static function modBCST(): array
    {
        return [
            '0' => 'Preço Tabelado Máx. Sugerido',
            '1' => 'Lista Negativa',
            '2' => 'Lista Positiva',
            '3' => 'Lista Neutra',
            '4' => 'Margem Valor Agregado (%)',
            '5' => 'Pauta (Valor)',
        ];
    }

    protected static function motDeson(): array
    {
        return [
            '1' => 'Táxi',
            '3' => 'Uso na agropecuária',
            '4' => 'Frotista/Locadora',
            '5' => 'Diplomático/Consular',
            '6' => 'Utilitários e Motocicletas da Amazônia Ocidental e Áreas de Livre Comércio (Resolução 714/88 e 790/94 – CONTRAN e suas alterações)',
            '7' => 'SUFRAMA',
            '8' => 'Venda a Órgão Público',
            '9' => 'Outros',
            '10' => 'Deficiente Condutor (Convênio ICMS 38/12);',
            '11' => 'Deficiente Não Condutor (Convênio ICMS 38/12).',
            '12' => 'Órgão de fomento e desenvolvimento agropecuário.',
        ];
    }

    protected static function modFrete(): array
    {
        return [
            '0' => 'CIF - Contratação do Frete por conta do Remetente',
            '1' => 'FOB - Contratação do Frete por conta do Destinatário',
            '2' => 'Contratação do Frete por conta de Terceiros',
            '3' => 'Transporte Próprio por conta do Remetente',
            '4' => 'Transporte Próprio por conta do Destinatário',
            '9' => 'Sem Ocorrência de Transporte'
        ];
    }

    protected static function empresaCRT(): array
    {
        return [
            1 => 'Simples Nacional',
            2 => 'Simples Nacional, excesso sublimite de receita bruta',
            3 => 'Regime Normal',
        ];
    }

    protected static function operacaoFiscal(): array
    {
        return [
            '0' => 'Entrada',
            '1' => 'Saída'
        ];
    }

    protected static function fiscalNFeFinalidade(): array
    {
        return [
            1 => 'NF-e normal',
            2 => 'NF-e complementar',
            3 => 'NF-e de ajuste',
            4 => 'Devolução de Mercadoria',
        ];
    }

    protected static function tipoDocumento(): array
    {
        return [
            'C100' => 'Nota Fiscal (01, 1B, 04, 55, 65)',
            'C500' => 'Nota Energia Elétrica, Água, Gás (06, 66, 29, 28)',
            'D100' => 'Nota Transportes (07, 08, 8B, 09, 10, 11, 26, 27, 57, 67, 63)',
            'D500' => 'Nota Serviços de Comunicação (21, 22)',
        ];
    }

}
