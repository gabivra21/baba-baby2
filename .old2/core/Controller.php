<?php

Class Controller{
    public $dados;

    public function __construct()
    {
        $dados = array();
    }

    public function carregarTemplate($nomeView, $dadosModel = array())
    {
        $this->dados = $dadosModel;
        require 'Views/template.php';
    }

    public function carregarViewNoTemplate($nomeView, $dadosModel = array())
    {
        extract($dadosModel);
        require'Views/'.$nomeView.'.php';
    }

}

?>