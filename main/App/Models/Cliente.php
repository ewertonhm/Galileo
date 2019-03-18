<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 20/02/2019
 * Time: 20:01
 */

namespace App\Models;

class Cliente
{
    private $idCliente, $nomeFantasia, $razaoSocial, $cidade, $cidadeId, $endereco, $cnpj;
    protected $dbCliente;
    private static $tabelaCliente = 'cliente';

    public function __construct()
    {
        $this->dbCliente = DB::get_instance();
    }

    public function carregarDados($nomeFantasia = NULL, $razaoSocial = NULL, $cidadeId = NULL, $endereco = NULL, $cnpj = NULL, $email = NULL, $telefones = NULL)
    {
        if ($nomeFantasia != NULL) {
            $this->setNomeFantasia($nomeFantasia);
        }
        if ($razaoSocial != NULL) {
            $this->setRazaoSocial($razaoSocial);
        }
        if ($cidadeId != NULL) {
            $this->setCidadeId($cidadeId);
            $this->cidade = new Cidade($this->getCidadeId());
        }
        if ($endereco != NULL){
            $this->setEndereco($endereco);
        }
        if ($cnpj != NULL) {
            $this->setCnpj($cnpj);
        }
    }

    public function criarCliente()
    {
        $params = [
            'nomefantasia' => $this->getNomeFantasia(),
            'razaosocial' => $this->getRazaoSocial(),
            'cnpj' => $this->getCnpj(),
            'cod_cidade' => $this->getCidadeId(),
            'cod_estado' => $this->cidade->getCodigoUfEstado(),
            'endereco' => $this->getEndereco()
        ];
        if($this->dbCliente->insert($this::$tabelaCliente,$params)){
            $this->setIdCliente($this->dbCliente->get_lastInsertID());
            return true;
        } else {
            return false;
        }

    }
    public function editarCliente()
    {

    }
    public function deletarCliente()
    {
        if($this->dbCliente->delete($this::$tabelaCliente,$this->getIdCliente())){
            return true;
        } else {
            return false;
        }
    }
    public function lerCliente()
    {

    }
    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * @param mixed $idCliente
     */
    public function setIdCliente($idCliente): void
    {
        $this->idCliente = $idCliente;
    }

    /**
     * @return mixed
     */
    public function getNomeFantasia()
    {
        return $this->nomeFantasia;
    }

    /**
     * @param mixed $nomeFantasia
     */
    public function setNomeFantasia($nomeFantasia): void
    {
        $this->nomeFantasia = $nomeFantasia;
    }

    /**
     * @return mixed
     */
    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }

    /**
     * @param mixed $razaoSocial
     */
    public function setRazaoSocial($razaoSocial): void
    {
        $this->razaoSocial = $razaoSocial;
    }

    /**
     * @return mixed
     */
    public function getCidadeId()
    {
        return $this->cidadeId;
    }

    /**
     * @param mixed $cidade
     */
    public function setCidadeId($cidadeId): void
    {
        $this->cidadeId = $cidadeId;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco): void
    {
        $this->endereco = $endereco;
    }

    /**
     * @return mixed
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * @param mixed $cnpj
     */
    public function setCnpj($cnpj): void
    {
        $this->cnpj = $cnpj;
    }


}