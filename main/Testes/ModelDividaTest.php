<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 28/02/2019
 * Time: 21:27
 */
require_once __DIR__ . '\..\vendor\autoload.php';
use App\Models\Divida;
use PHPUnit\Framework\TestCase;

class DividaTest extends TestCase
{

    public function testCriarDivida()
    {
        $d = new Divida();
        $d->setVencimento('10/10/20');
        $d->setValor(100);
        $this->assertTrue($d->criarDivida(1));
    }

    public function testEditarDivida()
    {
        $d = new Divida(1);
        $d->setValor(rand());
        $this->assertTrue($d->editarDivida());
    }

    public function testDeletarDivida()
    {
        $d = new Divida();
        $d->setVencimento('10/10/20');
        $d->setValor(rand());
        $d->criarDivida(1);
        $this->assertTrue($d->deletarDivida($d->getIdDivida()),$d->getIdDivida().'Deletado');

    }

    public function test__construct()
    {
        $d = new Divida(3);
        $this->assertEquals('2020-10-10',$d->getVencimento());
    }
}
