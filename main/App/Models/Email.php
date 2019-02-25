<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 20/02/2019
 * Time: 20:01
 */

namespace App\Models;

class Email
{
    private $idEmail, $email, $idPessoa, $idCliente;
    protected $dbEmail;
    static private $tabelaEmail = 'email';

    public function __construct($idCliente = NULL, $idPessoa = NULL, $idEmail = NULL)
    {
        $this->dbEmail = DB::get_instance();

        $this->setIdCliente($idCliente);
        if ($idCliente != NULL){
            $this->lerEmailCliente();
        }
        $this->setIdPessoa($idPessoa);
        if ($idPessoa != NULL){
            $this->lerEmailPessoa();
        }
        if ($idEmail != NULL){
            $this->setIdEmail($idEmail);
            $this->lerEmail();
        }
    }

    public function lerEmailCliente(){
        $params = [
            'conditions' => ['id_cliente = ?'],
            'bind' => [$this->getIdCliente()]
        ];
        $arrayEmails = [];
        $emails = $this->dbEmail->find($this::$tabelaEmail,$params);
        if(!is_bool($emails)){
            foreach ($emails as $email){
                $e = new Email(NULL,NULL,$email['id']);
                $arrayEmails[] = $e;
            }
            return $arrayEmails;
        } else {
            return false;
        }
    }

    public function lerEmailPessoa(){
        $params = [
            'conditions' => ['id_pessoa = ?'],
            'bind' => [$this->getIdPessoa()]
        ];
        $arrayEmails = [];
        $emails = $this->dbEmail->find($this::$tabelaEmail,$params);
        if(!is_bool($emails)){
            foreach ($emails as $email){
                $e = new Email(NULL,NULL,$email->id);
                $arrayEmails[] = $e;
            }
            return $arrayEmails;
        } else {
            return false;
        }
    }

    public function lerEmail(){
        $params = [
            'conditions' => ['id = ?'],
            'bind' => [$this->getIdEmail()]
        ];
        $emails = $this->dbEmail->findFirst($this::$tabelaEmail,$params);
        $this->setIdPessoa($emails->id_pessoa);
        $this->setIdCliente($emails->id_cliente);
        $this->setEmail($emails->email);
    }

    public function criarEmail(){
        $params = [
            'email' => $this->getEmail(),
            'id_pessoa' => $this->getIdPessoa(),
            'id_cliente' => $this->getIdCliente()
        ];
        if($this->dbEmail->insert($this::$tabelaEmail,$params)){
            $this->setIdEmail($this->dbEmail->get_lastInsertID());
            return true;
        } else {
            return false;
        }
    }

    public function editarEmail(){
        $params = [
            'email' => $this->getEmail(),
            'id_pessoa' => $this->getIdPessoa(),
            'id_cliente' => $this->getIdCliente()
        ];
        if($this->dbEmail->update($this::$tabelaEmail,$this->getIdEmail(),$params)){
            return true;
        } else {
            return false;
        }
    }

    public function deletarEmail(){
        if($this->dbEmail->delete($this::$tabelaEmail, $this->getIdEmail())){
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
    public function getIdEmail()
    {
        return $this->idEmail;
    }

    /**
     * @param mixed $idEmail
     */
    public function setIdEmail($idEmail)
    {
        $this->idEmail = $idEmail;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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