<?php

namespace Sts\Controllers;

class Erro{
    public function index(){
        $this->data = [];
        $loadView = new \Core\ConfigView("sts/Views//", $this->data);
        echo "pg erro view";
    }
}