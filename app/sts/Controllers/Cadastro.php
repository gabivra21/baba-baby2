<?php
namespace Sts\Controllers;

if (!defined ('C7E3L8K9E5')){
    header("Location: /");
    die("Error: Page not found");
}

class Cadastro {
    private array|null $data;
    private array|string|null $dataForm;

        

    public function index(): void
    {
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($this->dataForm['botao'])){
            var_dump($this->dataForm);
            $createCadastro = new \Sts\Models\StsCadastro();
            if($createCadastro->create($this->dataForm)){
                echo"Cadastrado<br>";
                echo $_SESSION["msg"];

            }else{
                echo"Não cadastrado";
                $_SESSION["msg"];
            }
            
        }
        var_dump($this->dataForm);
        $this->data = "Cadastro realizado com sucesso!<br>";
        $loadView = new \Core\ConfigView("sts/Views/cadastropais/cadastrarPais", $this->data);
        $loadView->loadView();

    }
}
?>