<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 20/02/2019
 * Time: 00:41
 */

require_once $_SERVER['DOCUMENT_ROOT'].'/Galileo/main/Views/Views.php';
class WebsiteCompiler
{
    public $pagename, $username;
    private $views;

    public function __construct($pagename, $username, $page){
        $this->views = new Views();
        $this->pagename = $pagename;
        $this->username = $username;

        $this->views->header($this->pagename);

        if ($page == 'index'){
            $this->views->navbar($this->username);
            $this->views->indexContent();
        }

        if ($page == 'login'){
            $this->views->login();
        }

        $this->views->footer();
    }

}