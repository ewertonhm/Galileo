<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 20/02/2019
 * Time: 19:44
 */

require_once 'DB.php';
require_once 'Pessoa.php';

class Usuario
{
    private $id, $login, $password, $idPessoa;
    protected $dbUsuario, $pessoa;
    static private $tabelaUsuario = 'usuario';

    public function __construct($id = NULL, $login = NULL)
    {
        $this->dbUsuario = DB::get_instance();
        if ($id != NULL){
            $this->setId($id);
            $this->lerUsuarioById();
        }
        else if ($login != NULL){
            $this->setLogin($login);
            $this->lerUsuarioByLogin();
        }
    }

    private function lerUsuarioById()
    {
        $params = [
            'conditions' => ['id = ?'],
            'bind' => [$this->getId()]
        ];
        $dados = $this->dbUsuario->findFirst($this::$tabelaUsuario,$params);
        $this->setLogin($dados->login);
        $this->setPassword($dados->password);
        $this->setIdPessoa($dados->id_pessoa);
        $this->pessoa = new Pessoa();
        $this->pessoa->lerPessoa($this->getIdPessoa());
    }

    private function lerUsuarioByLogin()
    {
        $params = [
            'conditions' => ['login = ?'],
            'bind' => [$this->getLogin()]
        ];
        $dados = $this->dbUsuario->findFirst($this::$tabelaUsuario,$params);
        $this->setId($dados->id);
        $this->setPassword($dados->password);
        $this->setIdPessoa($dados->id_pessoa);
        $this->pessoa = new Pessoa();
        $this->pessoa->lerPessoa($this->getIdPessoa());
    }




















    ////////////// GETTERS AND SETTERS ////////////////////////
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    private function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getIdPessoa()
    {
        return $this->idPessoa;
    }

    /**
     * @param mixed $idPessoa
     */
    private function setIdPessoa($idPessoa)
    {
        $this->idPessoa = $idPessoa;
    }


}