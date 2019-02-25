<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 25/02/2019
 * Time: 11:29
 */

require_once __DIR__ . '\..\vendor\autoload.php';

use PHPUnit\Framework\TestCase;
use App\Models\Estado;

class ModelEstadoTest extends TestCase
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
