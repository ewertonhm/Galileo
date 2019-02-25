<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 20/02/2019
 * Time: 01:16
 */

    require_once 'vendor/autoload.php';

    $loginController = new \App\Controllers\Login();
    if($loginController->isLogged()){
        header('location: index.php');
    } else {
        $website = new \App\Controllers\WebsiteCompiler('Galileo Login', 'login');
        if(isset($_POST['btn-login'])){
            if($loginController->login($_POST['login'],$_POST['password'])){
                header('location: index.php');
            }
        }
    }
