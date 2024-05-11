<?php
require 'configu.php';

/*include baba*/
$tempoexp = filter_input(INPUT_POST, 'tempoExp');
$ref = filter_input(INPUT_POST, 'ref');
$sobre = filter_input(INPUT_POST, 'sobre');
$fxetaria = filter_input(INPUT_POST, 'fk_idFxEtaria');
$valorh = filter_input(INPUT_POST, 'valorH');
$statuz = filter_input(INPUT_POST, 'statuz');
$idUsuario = filter_input(INPUT_POST, 'fk_idUsuario');

$sql = $pdo->prepare("INSERT INTO baba (tempoExp, ref, sobre, fk_idFxEtaria, valorH, statuz, fk_idUsuario) VALUES (:tempoExp, :ref, :sobre, :fk_idFxEtaria, :valorH, :statuz, :idUsuario);

");
$sql->bindValue(':tempoExp', $tempoexp);
$sql->bindValue(':ref', $ref);
$sql->bindValue(':sobre', $sobre);
$sql->bindValue(':fk_idFxEtaria', $fxetaria);
$sql->bindValue(':valorH', $valorh);
$sql->bindValue(':statuz', $statuz);
$sql->bindValue(':idUsuario', $idUsuario);
$sql->execute();

//ADICIONAR DISPONIBILIDADES DA BABA
$idBaba = $pdo->lastInsertId();
$diasSelecionados = filter_input(INPUT_POST, 'dia', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
$turnosSelecionados = filter_input(INPUT_POST, 'turno', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

if(!empty($diasSelecionados) && !empty($turnosSelecionados)){
    foreach ($diasSelecionados as $dia) {
        foreach ($turnosSelecionados as $turno) {
            $sql = $pdo->prepare("INSERT INTO disponibilidade (fk_idBaba, fk_idDia, fk_idTurno) VALUES (:idBaba, :dia, :turno);");
            $sql->bindValue(':idBaba', $idBaba);
            $sql->bindValue(':dia', $dia);
            $sql->bindValue(':turno', $turno);
            $sql->execute();
        }
    }
}

header("Location: select.php");