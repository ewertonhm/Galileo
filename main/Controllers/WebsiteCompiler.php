<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 20/02/2019
 * Time: 00:41
 */

require_once $_SERVER['DOCUMENT_ROOT'].'/Galileo/main/Views/Views.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Galileo/main/Models/Usuario.php';

class WebsiteCompiler
{
    public $pagename;
    private $views;

    public function __construct($pagename, $page){
        $this->views = new Views();
        $this->pagename = $pagename;

        $this->views->header($this->pagename);

        if ($page == 'index'){
            $this->views->navbar($this->getUsername());
            $this->views->indexContent();
        }

        if ($page == 'login'){
            $this->views->login();
        }

        $this->views->footer();
    }

    public function getUsername(){
        if(!isset($_SESSION)){
            session_start();
        }
        if($_SESSION['logado']){
            $usuario = new Usuario($_SESSION['user_id']);
            return $usuario->getLogin();
        } else {
            return 'ERROR::NOTLOGGEDIN';
        }
    }



}