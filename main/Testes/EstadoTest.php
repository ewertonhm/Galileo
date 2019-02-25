<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 25/02/2019
 * Time: 11:29
 */

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '\..\vendor\autoload.php';
use App\Models\Estado;

class EstadoTest extends TestCase
{

    public function testGetCodigoUf()
    {
        $e = new Estado(15);
        $this->assertEquals(15, $e->getCodigoUf());
    }

    public function testGetNome()
    {
        $e = new Estado(15);
        $this->assertEquals('Pará',$e->getNome());
    }

}
