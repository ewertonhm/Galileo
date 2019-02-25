<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 25/02/2019
 * Time: 11:49
 */

require_once __DIR__ . '\..\vendor\autoload.php';

use PHPUnit\Framework\TestCase;
use App\Models\Usuario;

class ModelUsuarioTest extends TestCase
{
    public function testLerUsuarioById(){
        $u = new Usuario(1);
        $this->assertEquals('admin', $u->getLogin());
    }

    public function testLerUsuarioByLogin(){
        $u = new Usuario(NULL, 'admin');
        $this->assertEquals(1, $u->getId());
    }

    public function testLerPessoa(){
        $u = new Usuario(1);
        $this->assertEquals(1, $u->getIdPessoa());
    }
}
