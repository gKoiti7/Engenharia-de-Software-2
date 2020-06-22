<?php

class Servidor extends Conexao{

    private $rgf;
    private $nome;
    private $cargo;
    private $salario;
    private $conexao;

    public function querySelect(){        
        $this->conexao = $this->conectar();        
        $query_dados = "SELECT * FROM servidores_prefeitura";
        $resultado_dados = $this->conexao->prepare($query_dados);
        $resultado_dados->execute();
        $resultado = $resultado_dados->fetchAll();
        return $resultado;
    }

    public function countQuery(){
        $valor = ceil(count($this->querySelect()));
        return $valor;
    }

    public function listar($nome, $ordem, $inicio, $qnt_result_pg){        
        $this->conexao = $this->conectar();        
        $query_dados = "SELECT * FROM servidores_prefeitura ORDER BY $nome $ordem LIMIT $inicio, $qnt_result_pg";
        $resultado_dados = $this->conexao->prepare($query_dados);
        $resultado_dados->execute();
        $resultado = $resultado_dados->fetchAll();
        return $resultado;
    }
    
    public function getRgf()
    {
        return $this->rgf;
    }

    
    public function setRgf($rgf)
    {
        $this->rgf = $rgf;

        return $this;
    }

     
    public function getNome()
    {
        return $this->nome;
    }

    
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    
    public function getCargo()
    {
        return $this->cargo;
    }

    
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    
    public function getSalario()
    {
        return $this->salario;
    }

    
    public function setSalario($salario)
    {
        $this->salario = $salario;

        return $this;
    }

    
    public function getConexao()
    {
        return $this->conexao;
    }

    
    public function setConexao($conexao)
    {
        $this->conexao = $conexao;

        return $this;
    }
}

?>