<?php

namespace Sts\Controllers;

//aqui vai a pagina inicial depois do login dos PAIS mostrando a listagem de babas!!
class MenuPais{

    private array $dados;

    public function index(){
        //echo "controller/pg Home-Pais<br>";

        $listarBaba = new \Sts\Models\StsListarBaba();
        $this->dados['babas'] = $listarBaba->listar();
        //var_dump($this->dados);
        $carregarView = new \Core\ConfigView("sts/Views/menupais/listarBaba", $this->dados);
        $carregarView->renderizar();
    }
}
