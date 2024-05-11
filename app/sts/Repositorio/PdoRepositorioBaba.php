<?php
namespace Sts\Repositorio;
use Sts\Models\Baba;
use \PDO;

Class PdoRepositorioBaba{
    private PDO $conexaoDB;

    public function __construct(PDO $connection) {
        $this->conexaoDB = $connection;
    }

}

?>