<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 20/02/2019
 * Time: 01:31
 */

class LoginController
{
    /**
     * LoginController constructor.
     */
    public function __construct(){
        if(!isset($_SESSION)){
            session_start();
        }
    }

    /**
     * @return bool
     */
    public function isLogged(){
        if (!isset($_SESSION['logado'])){
            return false;
        } else if ($_SESSION['logado'] == true){
            return true;
        } else {
            return false;
        }
    }

    public function login(){
        $_SESSION['logado'] = true;
    }

    public function logout(){
        $_SESSION['logado'] = false;
        $this->goToLogin();
    }

    /**
     * Redireciona para a pagina de login
     */
    public function goToLogin(){
        header('location: login.php');
    }
}