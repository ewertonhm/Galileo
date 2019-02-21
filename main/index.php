<?php
    require_once 'Controllers/Controllers.php';

    $loginController = new LoginController();

    if($loginController->isLogged()){
        $website = new WebsiteCompiler('Galileo controle financeiro','index');
    } else {
        $loginController->goToLogin();
    }

