<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 20/02/2019
 * Time: 20:01
 */

namespace App\Models;

class Divida
{
    private $idDivida, $valor, $vencimento, $idCliente;
    protected $dbDivida;
    private static $tabelaDivida = 'divida';

    public function __construct($idDivida = NULL)
    {
        $this->setIdDivida($idDivida);
        $this->dbDivida = DB::get_instance();
        if ($this->getIdDivida() != NULL){
            $this->lerDivida();
        }
    }

    public function criarDivida($idCliente)
    {
        $this->setIdCliente($idCliente);
        $params = [
            'id_cliente' => $this->getIdCliente(),
            'valor' => $this->getValor(),
            'vencimento' => $this->getVencimento()
        ];
        if($this->dbDivida->insert($this::$tabelaDivida,$params)){
            $this->setIdDivida($this->dbDivida->get_lastInsertID());
            return true;
        } else {
            return false;
        }
    }

    public function editarDivida($id = NULL)
    {
        if($id != NULL){
            $this->setIdDivida($id);
            $this->lerDivida();
        }
        $params = [
            'id_cliente' => $this->getIdCliente(),
            'valor' => $this->getValor(),
            'vencimento' => $this->getVencimento()
        ];
        if ($this->dbDivida->update($this::$tabelaDivida,$this->getIdDivida(),$params)){
            return true;
        } else {
            return true;
        }
    }

    public function deletarDivida($id = NULL)
    {
        if ($id != NULL){
            $this->setIdDivida($id);
        }
        if ($this->dbDivida->delete($this::$tabelaDivida, $this->getIdDivida())){
            return true;
        } else {
            return false;
        }
    }

    private function lerDivida()
    {
        $params = [
            'conditions' => ['id = ?'],
            'bind' => [$this->getIdDivida()]
        ];
        $divida = $this->dbDivida->findFirst($this::$tabelaDivida,$params);
        $this->setValor($divida->valor);
        $this->setVencimento($divida->vencimento);
        $this->setIdCliente($divida->id_cliente);
    }







    // Getters and Setter
    /**
     * @return mixed
     */
    public function getIdDivida()
    {
        return $this->idDivida;
    }

    /**
     * @param mixed $idDivida
     */
    public function setIdDivida($idDivida): void
    {
        $this->idDivida = $idDivida;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor): void
    {
        $this->valor = $valor;
    }

    /**
     * @return mixed
     */
    public function getVencimento()
    {
        return $this->vencimento;
    }

    /**
     * @param mixed $vencimento
     */
    public function setVencimento($vencimento): void
    {
        $this->vencimento = $vencimento;
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

}