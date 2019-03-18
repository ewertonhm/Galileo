<?php
/**
 * Created by PhpStorm.
 * User: E086510309
 * Date: 18/03/2019
 * Time: 16:11
 */

require_once __DIR__ . '\..\vendor\autoload.php';

use App\Models\Cliente;
use PHPUnit\Framework\TestCase;


class ModelClienteTest extends TestCase
{
    public function testCriarCliente(){
        $cliente = new Cliente();
        $cliente->carregarDados('teste','teste','5200050','teste teste teste', '0000000000');
        $this->assertTrue($cliente->criarCliente());
        $this->testDeletarCliente($cliente->getIdCliente());
    }

    public function testDeletarCliente($id){
        $cliente = new Cliente();
        $cliente->carregarDados('teste','teste','5200050','teste teste teste', '0000000001');
        $this->assertTrue($cliente->criarCliente());
        fwrite(STDERR, print_r($cliente->getIdCliente(), TRUE));
        $this->assertTrue($cliente->deletarCliente());
    }
}


