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
    public function __construct(private string $nameView, private array|string|null $data){
        //var_dump($this->nome);
        //var_dump($this->dados);
    }


    /**
    * CARREGAR VIEW
    */
    public function loadView(){
        if(file_exists('app/'. $this->nameView . '.php')){
            include 'app/sts/Views/include/header.php';
            include 'app/' . $this->nameView . '.php';
            include 'app/sts/Views/include/footer.php';
        }else{
            die("Erro CV-LV: Tente novamente.");
        }
    }
}
