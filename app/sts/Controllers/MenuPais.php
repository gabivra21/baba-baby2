<?php

namespace Sts\Controllers;

class MenuPais{

    private array $dados;

    public function index(){
        //echo "controller/pg Menu Pais<br>";

        $listarBaba = new \Sts\Models\StsListarBaba();
        $this->dados['babas'] = $listarBaba->listar();
        //var_dump($this->dados);
        $carregarView = new \Core\ConfigView("sts/Views/menupais/listarBaba", $this->dados);
        $carregarView->renderizar();
    }
}