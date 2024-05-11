<?php

namespace Sts\Repositorio;
use Sts\Models\Dia;
use \PDO;

class PdoRepositorioDia
{
    private PDO $conexaoDB;

    public function __construct(PDO $connection) {
        $this->conexaoDB = $connection;
    }

    public function diasDaSemana(): array {
        $querySQL = "SELECT * FROM dia;";

        $queryPreparada = $this->conexaoDB->prepare($querySQL);
        $queryPreparada->execute();
        $queryPreparada->setFetchMode(PDO::FETCH_ASSOC);
        $dias = $queryPreparada->fetchAll();

        $listaDias = [];
        foreach ($dias as $dia) {
            $dia = new Dia($dia["idDia"], $dia["nome"]);
            $listaDias[] = $dia;
        }

        return $listaDias;
    }

}