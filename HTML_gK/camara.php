<?php

class Camara extends Conexao{

    private $assunto;
    private $anotacao;
    private $conexao;

    public function querySelect(){        
        $this->conexao = $this->conectar();        
        $query_dados = "SELECT * FROM projetos_camara";
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
        $query_dados = "SELECT * FROM projetos_camara ORDER BY $nome $ordem LIMIT $inicio, $qnt_result_pg";
        $resultado_dados = $this->conexao->prepare($query_dados);
        $resultado_dados->execute();
        $resultado = $resultado_dados->fetchAll();
        return $resultado;
    }

    public function getAssunto()
    {
        return $this->assunto;
    }

    public function setAssunto($assunto)
    {
        $this->assunto = $assunto;

        return $this;
    }

    public function getAnotacao()
    {
        return $this->anotacao;
    }

    public function setAnotacao($anotacao)
    {
        $this->anotacao = $anotacao;

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