<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 26/02/2019
 * Time: 09:50
 */

require_once __DIR__ . '\..\vendor\autoload.php';

use PHPUnit\Framework\TestCase;

class ModelEmailTest extends TestCase
{
    public function testEmailCRUD(){
        $e = new \App\Models\Email();
        $e->setEmail('test@test.com');
        $this->assertTrue($e->criarEmail());
        $this->assertIsInt($e->getIdEmail());
        $this->assertTrue($this->deleteLastCreated($e->getIdEmail()));
    }


    public function deleteLastCreated($id){
        $e = new \App\Models\Email(NULL,NULL, $id);
        if($e->deletarEmail()){
            return true;
        } else {
            return false;
        }

    }
}
