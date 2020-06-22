<?php

Abstract class Conexao{

    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'projeto_transparencia';
    private $port = '3308';
    private $connect;

    public function conectar(): object{
        try{
            $this->connect = new PDO('mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbname, $this->user, $this->pass);
            return $this->connect;
        }catch(Exception $ex){
            //die("Erro: ..." . $ex);
            die("Erro: Por favor tente novamente. Caso o problema persista, entre em contato com o administrador.");
        }
    }
}

?>