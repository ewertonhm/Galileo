<?php
    require_once 'vendor/autoload.php';

    $loginController = new \App\Controllers\Login();

    if($loginController->isLogged()){
        $website = new \App\Controllers\WebsiteCompiler('Galileo controle financeiro','index');
    } else {
        $loginController->goToLogin();
    }

