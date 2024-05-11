<?php

namespace Sts\Controllers;

//aqui vai a pagina inicial de todos sem o cadastro
class Home{
    /**
     * INSTANCIA A CLASSE PARA CARREGAR A VIEW
     */
    public function index(){
        
        $this->data = [];
        $loadView = new \Core\ConfigView("sts/Views/home/pagInicial", $this->data);
        echo "pg home view";
    }
}