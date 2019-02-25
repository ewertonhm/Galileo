<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 25/02/2019
 * Time: 08:56
 */

use PHPUnit\Framework\TestCase;
use App\Models\Cidade;

class ModelCidadeTest extends TestCase
{

    public function testGetCodigoIbge()
    {
        $t = new Cidade(1500107);
        $this->assertEquals(1500107,$t->getCodigoIbge());
    }

    public function testGetNome()
    {
        $t = new Cidade(1500107);
        $this->assertEquals('Abaetetuba',$t->getNome());
    }

    public function testGetLatitude()
    {
        $t = new Cidade(1500107);
        $this->assertEquals('-1.72183',$t->getLatitude());
    }

    public function testGetLongitude()
    {
        $t = new Cidade(1500107);
        $this->assertEquals('-48.8788',$t->getLongitude());
    }

    public function testGetCapital(){
        $t = new Cidade(1500107);
        $this->assertFalse($t->getCapital());
    }

    public function testGetNomeEstado(){
        $t = new Cidade(1500107);
        $this->assertEquals('Pará',$t->getNomeEstado());
    }
}
