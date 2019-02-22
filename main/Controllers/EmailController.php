<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 22/02/2019
 * Time: 19:57
 */

require_once $_SERVER['DOCUMENT_ROOT'].'/Galileo/main/Models/Email.php';

class EmailController
{
    private $emails, $emailModel;

    public function __construct()
    {
        $this->emails = [];
    }

    public function emailCliente($idCliente){
        $emails = $this->emailModel = new Email($idCliente);
        if (!id_bool($emails)){
            foreach ($emails as $email) {
                $e = new Email($email['id']);
                    $this->emails[] = $e;
            }
        }
    }

    public function emailPessoa($idPessoa){
        $emails = $this->emailModel = new Email($idPessoa);
        if (!id_bool($emails)){
            foreach ($emails as $email) {
                $e = new Email(NULL, $email['id']);
                    $this->emails[] = $e;
            }
        }
    }

    public function getEmails(){
        return $this->emails;
    }
}