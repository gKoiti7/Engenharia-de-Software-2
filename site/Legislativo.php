<?php

class Legislativo extends Servidor{

    private $projeto;
    private $assunto;
    private $anotacao;

 
    public function getProjeto()
    {
        return $this->projeto;
    }

    public function setProjeto($projeto)
    {
        $this->projeto = $projeto;

        return $this;
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
}