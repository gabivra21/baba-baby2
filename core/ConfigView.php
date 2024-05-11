<?php

namespace Core;

class ConfigView{

    //ANTES DO PHP 8
    //private string $nome;
    //private array $dados;

    //public function __construct(string $nome, array $dados){

        //$this->nome = $nome;
        //$this->dados = $dados;
        //var_dump($this->nome);
        //var_dump($this->dados);
    //}

    //*A PARTIR DO PHP 8
    public function __construct(private string $nome, private array $dados){
        //var_dump($this->nome);
        //var_dump($this->dados);
    }

    public function loadView(){
        if(file_exists('app/'. $this->nameView . '.php')){
            include 'app/' . $this->nomeView . '.php';
        }else{
            die("Erro CV-LV: Tente novamente.");
        }
    }
}
