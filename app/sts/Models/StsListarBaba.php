<?php

namespace Sts\Models;

class StsListarBaba extends Conn{

    private object $conn;

    public function listar() : array
    {
        //echo "Acessou a models listar<br>";
        $this->conn = $this->connectDb();

        $query_babas = "SELECT DISTINCT b.idBaba, u.nome as nomeBaba, 
        b.tempoExp, b.sobre, f.nome as fxEtaria, 
        b.valor 
        FROM baba as b
        LEFT JOIN usuario as u ON b.pk_idUsuario = u.idUsuario 
        LEFT JOIN fxetaria as f ON b.fk_idFxEtaria = f.idFxEtaria
        ORDER BY idBaba DESC;";
        $result_babas = $this->conn->prepare($query_babas);
        $result_babas->execute();
        $retorno = $result_babas->fetchAll();
        //var_dump($retorno);
        return $retorno;
    }
}