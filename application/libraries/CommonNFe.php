<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'vendor/autoload.php';
require_once 'application/traits/Traits.php';

class CommonNFe
{
    use Traits;

    const DIR_NFE = 'clientes/{id}/nfe/{amb}/';
    private $_CI;
    protected $xml;

    protected $empresa;

    //Directories
    public $assDir;//Assinadas
    public $envDir;//Enviadas
    public $aprDir;//Aprovadas
    public $repDir;//Reprovadas
    public $canDir;//Canceladas
    public $cceDir;//CartaCorrecao
    public $temDir;//Temporárias
    public $chaveNFe;
    public $errors;


    public function __construct()
    {
        $this->_CI = &get_instance();
        $this->empresa = $this->_CI->empresa->getEmpresaById(getDadosUsuarioLogado()['id_empresa']);

        //Directories
        $doc = $this->empresa->id_empresa;
        $amb = ($this->empresa->ambiente_nfe == 1) ? 'producao' : 'homologacao';
        $base = str_replace(['{id}', '{amb}'], [$doc, $amb], self::DIR_NFE);
        if (!is_dir($base) && !mkdir($base, 0755, true)) {
//            $this->setErrors('Sem permissão para criar diretórios NF-e. Diretório: ' . $base);
//            return false;
            throw new Exception('Sem permissão para criar diretórios NF-e. Diretório: ' . $base);
        }
        $this->temDir = $base . 'temporarias/';
        !is_dir($this->temDir) ? mkdir($this->temDir, 0755, true) : null;
        $this->assDir = $base . 'assinadas/';
        !is_dir($this->assDir) ? mkdir($this->assDir, 0755) : null;
        $this->envDir = $base . 'enviadas/';
        !is_dir($this->envDir) ? mkdir($this->envDir, 0755) : null;
        $this->aprDir = $this->envDir . 'aprovadas/';
        !is_dir($this->aprDir) ? mkdir($this->aprDir, 0755) : null;
        $this->repDir = $this->envDir . 'reprovadas/';
        !is_dir($this->repDir) ? mkdir($this->repDir, 0755) : null;
        $this->canDir = $base . 'canceladas/';
        !is_dir($this->canDir) ? mkdir($this->canDir, 0755) : null;
        $this->cceDir = $base . 'cartacorrecao/';
        !is_dir($this->cceDir) ? mkdir($this->cceDir, 0755) : null;

        //Temp dir - current month/year
        !is_dir($this->temDir . date('Ymd')) ? mkdir($this->temDir . date('Ymd'), 0755) : null;
    }

    /**
     * Lâ arquivo XML e carrega na variável xml
     * @param $xml
     * @return $this
     */
    public function readXML($xml)
    {
        $dom = new \DOMDocument();
        $dom->loadXML($xml);
        $dom->preserveWhiteSpace = FALSE;
        $dom->formatOutput = TRUE;
        $this->xml = $dom;
        return $this;

    }

    /**
     * Carrega chave NF-e
     * @return string
     */
    public function getChaveNFe()
    {
        return self::onlyNumbers($this->xml->getElementsByTagName('infNFe')->item(0)->getAttribute('Id'));
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param mixed $errors
     */
    public function setErrors($errors): void
    {
        $this->errors = $errors;
    }
}
