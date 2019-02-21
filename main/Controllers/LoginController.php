<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 20/02/2019
 * Time: 01:31
 */

require_once $_SERVER['DOCUMENT_ROOT'].'/Galileo/main/Models/Usuario.php';

class LoginController
{
    private $usuario;


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

    public function login($login,$password){
        $this->usuario = new Usuario(NULL,$login);
        if(md5($password) == $this->usuario->getPassword()){
            $_SESSION['logado'] = true;
            $_SESSION['user_id'] = $this->usuario->getId();
            return true;
        }
        else {
            $_SESSION['logado'] = false;
            return false;
        }
    }

    public function logout(){
        session_unset();
        session_destroy();
        $this->goToLogin();
    }

    /**
     * Redireciona para a pagina de login
     */
    public function goToLogin(){
        header('location: login.php');
    }
}