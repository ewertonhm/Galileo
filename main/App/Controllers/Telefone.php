<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 21/02/2019
 * Time: 12:27
 */

namespace App\Controllers;

use App\Models\Telefone as TelefoneModel;

class Telefone
{
    private $telefones, $telefoneModel;

    public function __construct()
    {
        $this->telefones = [];
    }

    public function telefoneCliente($idCliente)
    {
        $telefones = $this->telefoneModel = new TelefoneModel($idCliente);
        if (!is_bool($telefones)) {
            foreach ($telefones as $telefone) {
                $t = new TelefoneModel($telefone['id']);
                $this->telefones[] = $t;
            }
        }
    }

    public function telefonePessoa($idPessoa)
    {
        $telefones = $this->telefoneModel = new TelefoneModel($idPessoa);
        if (!is_bool($telefones)) {
            foreach ($telefones as $telefone) {
                $t = new TelefoneModel( NULL, $telefone['id']);
                $this->telefones[] = $t;
            }
        }
    }

    public function getTelefones()
    {
        return $this->telefones;
    }
}