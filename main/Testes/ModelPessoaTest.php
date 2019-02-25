<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 25/02/2019
 * Time: 19:40
 */

require_once __DIR__ . '\..\vendor\autoload.php';

use App\Models\Pessoa;
use PHPUnit\Framework\TestCase;

class ModelPessoaTest extends TestCase
{

    public function testLerPessoa()
    {
        $p = new Pessoa();
        $p->lerPessoa(1);
        $this->assertEquals('administrador', $p->getNome());
    }
}
