<?php
namespace Sts\Models;

if (!defined ('C7E3L8K9E5')){
    header("Location: /");
    die("Error: Page not found");
}

class StsCadastro {
    private array $data;
    public function create(array $data) :bool
    {
        $this->data =$data;
        var_dump($this->data );
        $_SESSION["msg"]="<p>Salvar mensagem</p>";
        return true;

    }
    

   


}

?>
