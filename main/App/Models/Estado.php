<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 20/02/2019
 * Time: 20:01
 */

namespace App\Models;

class Estado
{
    private $uf, $nome, $codigo_uf;
    protected $dbEstado;
    static protected $tabelaEstado = 'estado';

    public function __construct($codigo_uf)
    {
        $this->dbEstado = DB::get_instance();
        $this->setCodigoUf($codigo_uf);
        $this->lerEstado();
    }

    private function lerEstado(){
        $params = [
            'conditions' => ['codigo_uf = ?'],
            'bind' => [$this->getCodigoUf()]
        ];
        $dados = $this->dbEstado->findFirst($this::$tabelaEstado,$params);
        $this->setNome($dados->nome);
        $this->setUf($dados->uf);
    }




    // Getters and Setters
    /**
     * @return mixed
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * @param mixed $uf
     */
    private function setUf($uf)
    {
        $this->uf = $uf;
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
    private function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getCodigoUf()
    {
        return $this->codigo_uf;
    }

    /**
     * @param mixed $codigo_uf
     */
    private function setCodigoUf($codigo_uf)
    {
        $this->codigo_uf = $codigo_uf;
    }



}