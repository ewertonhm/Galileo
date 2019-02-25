<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 20/02/2019
 * Time: 21:48
 */

require_once 'vendor/autoload.php';

$loginController = new \App\Controllers\Login();
$loginController->logout();