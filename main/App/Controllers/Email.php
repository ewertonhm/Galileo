<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 22/02/2019
 * Time: 19:57
 */

namespace App\Controllers;

class Email
{
    private $emails, $emailModel;

    public function __construct()
    {
        $this->emails = [];
    }

    public function emailCliente($idCliente)
    {
        $emails = $this->emailModel = new \App\Models\Email($idCliente);
        if (!is_bool($emails)){
            foreach ($emails as $email) {
                $e = new \App\Models\Email($email['id']);
                    $this->emails[] = $e;
            }
        }
    }

    public function emailPessoa($idPessoa)
    {
        $emails = $this->emailModel = new \App\Models\Email($idPessoa);
        if (!is_bool($emails)){
            foreach ($emails as $email) {
                $e = new \App\Models\Email(NULL, $email['id']);
                    $this->emails[] = $e;
            }
        }
    }

    public function getEmails()
    {
        return $this->emails;
    }
}