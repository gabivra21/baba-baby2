<?php
namespace Sts\Controllers;

if (!defined ('C7E3L8K9E5')){
    header("Location: /");
    die("Error: Page not found");
}

class CadastroPais {
    private array|string|null $data;

        

    public function index(){
        $this->data = "Cadastro realizado com sucesso!<br>";
        $loadView = new \Core\ConfigView("sts/Views/cadastropais/cadastrarPais", $this->data);
        $loadView->loadView();

    }
}
?>