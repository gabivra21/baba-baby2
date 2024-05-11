<?php

namespace Sts\Controllers;

//aqui vai a pagina inicial depois do login da BABA mostrando o menu de acoes!!
class MenuBaba{
    public function index(){
        $this->data = [];
        $loadView = new \Core\ConfigView("sts/Views//", $this->data);
        echo "pg menubaba view";
    }
}