<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 21/02/2019
 * Time: 12:27
 */

require_once $_SERVER['DOCUMENT_ROOT'].'/Galileo/main/Models/Telefone.php';

class TelefoneController
{
    private $telefones, $telefoneModel;

    public function __construct()
    {
        $this->telefones = [];
    }

    public function telefoneCliente($idCliente)
    {
        $telefones = $this->telefoneModel = new Telefone($idCliente);
        if (!is_bool($telefones)) {
            foreach ($telefones as $telefone) {
                $t = new Telefone($telefone['id']);
                $this->telefones[] = $t;
            }
        }
    }

    public function telefonePessoa($idPessoa)
    {
        $telefones = $this->telefoneModel = new Telefone($idPessoa);
        if (!is_bool($telefones)) {
            foreach ($telefones as $telefone) {
                $t = new Telefone( NULL, $telefone['id']);
                $this->telefones[] = $t;
            }
        }
    }

    public function getTelefones()
    {
        return $this->telefones;
    }
}