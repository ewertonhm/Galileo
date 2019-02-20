<?php
/**
 * Created by PhpStorm.
 * User: Ewert
 * Date: 20/02/2019
 * Time: 20:01
 */

require_once 'DB.php';
require_once 'Estado.php';

class Cidade
{
    private $codigo_ibge, $nome, $latitude, $longitude, $capital, $codigoUfEstado;
    protected $dbCidade, $estado;
    static private $tabelaCidade = 'cidade';

    public function __construct($codigo_ibge)
    {
        $this->codigo_ibge = $codigo_ibge;
        $this->dbCidade = DB::get_instance();
        $this->lerCidade();
        $this->estado = new Estado($this->getCodigoUfEstado());
    }

    private function lerCidade()
    {
        $params = [
            'conditions' => ['codigo_ibge = ?'],
            'bind' => [$this->getCodigoIbge()]
        ];
        $dados = $this->dbCidade->findFirst($this::$tabelaCidade,$params);
        $this->setNome($dados->nome);
        $this->setCapital($dados->capital);
        $this->setLatitude($dados->latitude);
        $this->setLongitude($dados->longitude);
        $this->setCodigoUfEstado($dados->codigo_uf_estado);
    }











    // Getters and Setters
    /**
     * @return mixed
     */
    public function getCodigoIbge()
    {
        return $this->codigo_ibge;
    }

    /**
     * @param mixed $codigo_ibge
     */
    private function setCodigoIbge($codigo_ibge)
    {
        $this->codigo_ibge = $codigo_ibge;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    private function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    private function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    private function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * @param mixed $capital
     */
    private function setCapital($capital)
    {
        $this->capital = $capital;
    }

    public function getCodigoUfEstado(){
        return $this->codigoUfEstado;
    }

    private function setCodigoUfEstado($codigoUfEstado){
        $this->codigoUfEstado = $codigoUfEstado;
    }

}