<?php

namespace Core;

class ConfigView{

    /* //ANTES DO PHP 8
    private string $nome;
    private array $dados;

    public function __construct(string $nome, array $dados){

        $this->nome = $nome;
        $this->dados = $dados;
        //var_dump($this->nome);
        //var_dump($this->dados);
    }*/

    //A PARTIR DO PHP 8
    public function __construct(private string $nome, private array $dados){
        //var_dump($this->nome);
        //var_dump($this->dados);
    }

    public function renderizar(){
        if(file_exists('app/' . $this->nome . '.php')){
            include 'app/' . $this->nome . '.php';
        }else{
            echo "Erro CV: Por favor, tente novamente. Ou entre em contato com o administrador.";
        }
    }

    public function loadView(){
        
    }
}