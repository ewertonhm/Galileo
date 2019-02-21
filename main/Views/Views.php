<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 19/02/2019
 * Time: 23:49
 */

class Views
{
    public function header($pagename){
        echo <<<TAG
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='icon' href='assets/img/logog.png'>
    <title>
TAG;
        echo $pagename;
        echo <<<TAG
        
    </title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="assets/css/Data-Table.css">
    <link rel="stylesheet" href="assets/css/Data-Table.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/MUSA_no-more-tables.css">
    <link rel="stylesheet" href="assets/css/MUSA_no-more-tables.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>              
TAG;
    }

    public function navbar($username){
        echo <<<TAG
<nav class='navbar navbar-expand-lg navbar-light bg-light'>
  <a class='navbar-brand' href='index.php'><img src='assets/img/logog.png' width='30' height='32'></a>
  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>

  <div class='collapse navbar-collapse' id='navbarSupportedContent'>
    <ul class='navbar-nav mr-auto'>
      <li class='nav-item active'>
        <a class='nav-link' href='index.php'>Inicio<span class='sr-only'>(current)</span></a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='#'>Sobre</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link disabled' href='#'>Configurações</a>
      </li>
    </ul>
      <ul class='nav navbar-nav navbar-right'>
          <li class='nav-item'>
            <a class='nav-link disabled' href='#'>Logado como:&nbsp
TAG;
        echo $username;
        echo <<<TAG
            &nbsp</a>
           </li>
        <li class='nav-item'>
            <a href='logout.php'>      
                <button class='btn btn-outline-primary btn-sm' type='submit' name="btn-logout">Sair</button>
            </a>
        </li>
        </ul>

  </div>
</nav>

TAG;
    }

    public function footer(){
        echo <<<TAG
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
</body>
</html>
TAG;
    }

    public function indexContent(){
        echo <<<TAG
   <div class='features-boxed'>
        <div class='container'>
            <div class='row justify-content-center features'>
                <div class='col-sm-6 col-md-5 col-lg-4 item'>
                    <a href='cadcli.php'>
                        <div data-bs-hover-animate='pulse' class='box'><i class='fa fa-user-plus icon'></i>
                            <h3 class='name'>Cadastrar clientes</h3>
                        </div>
                    </a>
                </div>
                <div class='col-sm-6 col-md-5 col-lg-4 item'>
                    <a href='cadcob.php'>
                        <div data-bs-hover-animate='pulse' class='box'><i class='fa fa-money icon'></i>
                            <h3 class='name'>Cadastrar cobrança</h3>
                        </div>
                    </a>
                </div>
                <div class='col-sm-6 col-md-5 col-lg-4 item'>
                    <a href='confpag.php'>
                        <div data-bs-hover-animate='pulse' class='box'><i class='fa fa-check-square-o icon'></i>
                            <h3 class='name'>Confirmar pagamentos</h3>
                        </div>
                    </a>
                </div>
                <div class='col-sm-6 col-md-5 col-lg-4 item'>
                    <a href='listacli.php'>
                        <div data-bs-hover-animate='pulse' class='box'><i class='fa fa-users icon'></i>
                            <h3 class='name'>Listar clientes</h3>
                        </div>
                    </a>
                </div>
                <div class='col-sm-6 col-md-5 col-lg-4 item'>
                    <a href='calendario.php'>
                        <div data-bs-hover-animate='pulse' class='box'><i class='fa fa-calendar icon'></i>
                            <h3 class='name'>Calendário de cobranças</h3>
                        </div>
                    </a>
                </div>
                <div class='col-sm-6 col-md-5 col-lg-4 item'>
                    <a href='cobli.php'>
                        <div data-bs-hover-animate='pulse' class='box'><i class='fa fa-list-alt icon'></i>
                            <h3 class='name'>Listar cobranças</h3>
                        </div>
                    </a>
                </div>
                <div class='col-sm-6 col-md-5 col-lg-4 item'>
                    <a href='delcli.php'>
                        <div data-bs-hover-animate='pulse' class='box'><i class='fa fa-user-times icon'></i>
                            <h3 class='name'>Deletar clientes</h3>
                        </div>
                    </a>
                </div>
                <div class='col-sm-6 col-md-5 col-lg-4 item'>
                    <a href='delcob.php'>
                        <div data-bs-hover-animate='pulse' class='box'><i class='fa fa-remove icon'></i>
                            <h3 class='name'>Deletar cobranças</h3>
                        </div>
                    </a>
                </div>
                <div class='col-sm-6 col-md-5 col-lg-4 item'>
                    <a href='agenda.php'>
                        <div data-bs-hover-animate='pulse' class='box'><i class='fa fa-phone icon'></i>
                            <h3 class='name'>Agenda telefônica</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
TAG;
    }

    public function login(){
        echo <<<TAG
    <div class="login-clean" style="padding:100px 0px;">
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="fa fa-lock" style="color:rgb(71,161,244);"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="login" placeholder="Login" autofocus=""></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Senha"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="btn-login" style="background-color:rgb(71,161,244);">Entrar</button></div>
            <a href="#" class="forgot">Esqueceu seu login ou senha?</a>
        </form>
    </div>
TAG;

    }

}