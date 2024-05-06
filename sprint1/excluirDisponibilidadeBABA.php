<?php

require 'configu.php';

$id = filter_input(INPUT_GET, 'idDisponibilidade');
$idBaba = filter_input(INPUT_GET, 'idBaba');

$querySQL = "DELETE FROM disponibilidade WHERE idDisponibilidade = $id";
$queryPreparada = $pdo->prepare($querySQL);
$queryPreparada->execute();
header("Location: editarDisponibilidadeBABA.php?idBaba=$idBaba");
?>