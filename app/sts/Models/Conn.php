<?php

namespace Sts\Models;

use PDO;
use PDOException;

abstract  class Conn{
    private string $db = "mysql";
    private string $host = "localhost";
    private string $user = "root";
    private string $pass = "PUC@1234";
    private string $dbname = "babababy_";
    private int $port = 3306;
    private object $connect;

    public function connectDb(){
        try{
            //conexao COM PORTA
            //$this->connect = new PDO($this->db . ':host=' . $this->host . ';port=' . $this->port . ';dbname=' .
            //$this->dbname, $this->user, $this->pass);

            //conexao SEM PORTA
            $this->connect = new PDO($this->db . ':host=' . $this->host . ';dbname=' .
            $this->dbname, $this->user, $this->pass);

            //echo "Conexao realizada com sucesso!";
            return $this->connect;
        }catch (PDOException $err){
            die("Erro: Por favor, tente novamente. Ou entre em contato com o administrador.");
        }
    }
}


