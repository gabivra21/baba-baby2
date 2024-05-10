<?php
namespace Sts\Models;

class StsCadastroPais extends Conn{
    private object $conn;

    public function cadastrar(){
        $this->conn = $this->connectDb();

    }



}

?>
