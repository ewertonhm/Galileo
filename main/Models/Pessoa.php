<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 20/02/2019
 * Time: 20:00
 */

require_once 'DB.php';
require_once 'Cidade.php';
require_once 'TelefonePessoa.php';
require_once 'EmailPessoa.php';

class Pessoa
{
    private $id, $nome, $sobrenome, $endereco, $codCidade, $telefones, $emails;
    protected $dbPessoa, $cidade;
    static private $tabelaPessoa = 'pessoa';

    public function __construct()
    {
        $this->dbPessoa = DB::get_instance();
    }





    //////////// GETTER AND SETTERS ///////////////////
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    /**
     * @param mixed $sobrenome
     */
    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
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
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * @return mixed
     */
    public function getCodCidade()
    {
        return $this->codCidade;
    }

    /**
     * @param mixed $codCidade
     */
    public function setCodCidade($codCidade)
    {
        $this->codCidade = $codCidade;
    }


}