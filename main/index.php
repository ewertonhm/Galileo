<?php
    require_once 'Controllers/Controllers.php';

    $loginController = new LoginController();

    if($loginController->isLogged()){
        $website = new WebsiteCompiler('Galileo controle financeiro', 'Usuário', 'index');
    } else {
        $loginController->goToLogin();
    }

