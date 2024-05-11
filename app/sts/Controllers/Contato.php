<?php

namespace Sts\Controllers;

class Contato{
    public function index(){
        $this->data = [];
        $loadView = new \Core\ConfigView("sts/Views//", $this->data);
        echo "pg contato view";
    }
}