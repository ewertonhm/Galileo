<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 20/02/2019
 * Time: 20:01
 */
require_once 'DB.php';

class Telefone
{
    private $idTelefone, $ddd, $numero, $idPessoa, $idCliente;
    protected $dbTelefone;
    static private $tabelaTelefone = 'telefone';

    public function __construct($idCliente = NULL, $idPessoa = NULL, $idTelefone = NULL)
    {
        $this->dbTelefone = DB::get_instance();

        $this->setIdCliente($idCliente);
        if ($idCliente != NULL){
            $this->lerTelefoneCliente();
        }
        $this->setIdPessoa($idPessoa);
        if ($idPessoa != NULL){
            $this->lerTelefonePessoa();
        }
        if ($idTelefone != NULL){
            $this->setIdTelefone($idTelefone);
            $this->lerTelefone();
        }
    }

    public function lerTelefoneCliente(){
        $params = [
            'conditions' => ['id_cliente = ?'],
            'bind' => [$this->getIdCliente()]
        ];
        $arrayTelefones = [];
        $telefones = $this->dbTelefone->find($this::$tabelaTelefone,$params);
        if(!is_bool($telefones)){
            foreach ($telefones as $telefone){
                $t = new Telefone(NULL,NULL,$telefone['id']);
                $arrayTelefones[] = $t;
            }
            return $arrayTelefones;
        } else {
            return false;
        }
    }

    public function lerTelefonePessoa(){
        $params = [
            'conditions' => ['id_pessoa = ?'],
            'bind' => [$this->getIdPessoa()]
        ];
        $arrayTelefones = [];
        $telefones = $this->dbTelefone->find($this::$tabelaTelefone,$params);
        if(!is_bool($telefones)){
            foreach ($telefones as $telefone){
                $t = new Telefone(NULL,NULL,$telefone['id']);
                $arrayTelefones[] = $t;
            }
            return $arrayTelefones;
        } else {
            return false;
        }
    }

    public function lerTelefone(){
        $params = [
            'conditions' => ['id = ?'],
            'bind' => [$this->getIdTelefone()]
        ];
        $telefones = $this->dbTelefone->findFirst($this::$tabelaTelefone,$params);
        $this->setIdPessoa($telefones['id_pessoa']);
        $this->setIdCliente($telefones['id_cliente']);
        $this->setDdd($telefones['ddd']);
        $this->setNumero($telefones['numero']);
    }

    public function criarTelefone(){
        $params = [
            'ddd' => $this->getDdd(),
            'numero' => $this->getNumero(),
            'id_pessoa' => $this->getIdPessoa(),
            'id_cliente' => $this->getIdCliente()
        ];
        if($this->dbTelefone->insert($this::$tabelaTelefone,$params)){
            $this->setIdTelefone($this->dbTelefone->get_lastInsertID());
            return true;
        } else {
            return false;
        }
    }

    public function editarTelefone(){
        $params = [
            'ddd' => $this->getDdd(),
            'numero' => $this->getNumero(),
            'id_pessoa' => $this->getIdPessoa(),
            'id_cliente' => $this->getIdCliente()
        ];
        if($this->dbTelefone->update($this::$tabelaTelefone,$this->getIdTelefone(),$params)){
            return true;
        } else {
            return false;
        }
    }

    public function deletarTelefone(){
        if($this->dbTelefone->delete($this::$tabelaTelefone, $this->getIdTelefone())){
            return true;
        }
        else {
            return false;
        }
    }
















    ///////////// GETTERS AND SETTERS ///////////////////////
    /**
     * @return mixed
     */
    public function getIdTelefone()
    {
        return $this->idTelefone;
    }

    /**
     * @param mixed $idTelefone
     */
    public function setIdTelefone($idTelefone)
    {
        $this->idTelefone = $idTelefone;
    }

    /**
     * @return mixed
     */
    public function getDdd()
    {
        return $this->ddd;
    }

    /**
     * @param mixed $ddd
     */
    public function setDdd($ddd)
    {
        $this->ddd = $ddd;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getIdPessoa()
    {
        return $this->idPessoa;
    }

    /**
     * @param mixed $idPessoa
     */
    public function setIdPessoa($idPessoa)
    {
        $this->idPessoa = $idPessoa;
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
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }
}