<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 20/02/2019
 * Time: 01:31
 */

class LoginController
{
    public function __construct(){
        if(!isset($_SESSION)){
            session_start();
        }
        $_SESSION['logado'] = true;
    }
}