<?php

require 'configu.php';

$idBaba = $_GET['idBaba'];

//ADICIONAR DISPONIBILIDADES DA BABA
$diasSelecionados = filter_input(INPUT_POST, 'dia', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
$turnosSelecionados = filter_input(INPUT_POST, 'turno');

if (!empty($diasSelecionados) && !empty($turnosSelecionados)) {
    foreach ($diasSelecionados as $dia) {
        
        if (verificaDisponibilidade($idBaba, $dia, $turnosSelecionados)) {
            continue;
        }

        $pdo->beginTransaction();
        try {
            $sql = $pdo->prepare("INSERT INTO disponibilidade (fk_idBaba, fk_idDia, fk_idTurno) VALUES (:idBaba, :dia, :turno);");
            $sql->bindValue(':idBaba', $idBaba);
            $sql->bindValue(':dia', $dia);
            $sql->bindValue(':turno', $turnosSelecionados);
            $sql->execute();
            $pdo->commit();
        } catch (PDOException $e) {
            $pdo->rollBack();
            alerta("Erro: " . $e->getMessage());
        }
    }
}

function verificaDisponibilidade($idBaba, $dia, $turno) {
    require 'configu.php';
    $querySQL = "SELECT * FROM disponibilidade WHERE fk_idBaba = $idBaba AND fk_idDia = $dia AND fk_idTurno = $turno;";
    $sql = $pdo->query($querySQL);
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (count($result) > 0) {
        return true;
    } else {
        return false;
    }
}
header("Location: disponibilidadeBABA.php?idBaba=$idBaba");