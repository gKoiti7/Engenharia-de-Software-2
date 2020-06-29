<?php

class Servidor extends Funcionario{

    private $rgf;
 
    public function getRgf()
    {
        return $this->rgf;
    }

    public function setRgf($rgf)
    {
        $this->rgf = $rgf;

        return $this;
    }

}