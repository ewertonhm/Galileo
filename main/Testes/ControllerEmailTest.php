<?php
/**
 * Created by PhpStorm.
 * User: E086510309
 * Date: 25/02/2019
 * Time: 17:31
 */

require_once __DIR__ . '\..\vendor\autoload.php';

use App\Controllers\Email;
use PHPUnit\Framework\TestCase;

class ControllerEmailTest extends TestCase
{
    public function testEmailCliente(){
        $e = new Email();
        $e->emailCliente(1);
        $this->assertIsArray($e->getEmails());
    }

    public function testEmailPessoa(){
        $e = new Email();
        $e->emailPessoa(1);
        $this->assertIsArray($e->getEmails());
    }

}
