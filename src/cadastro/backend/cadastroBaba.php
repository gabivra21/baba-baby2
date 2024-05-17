<?php

require '../../database/configu.php';



$idUsuario = $_COOKIE['idUsuario'];
$tempoExp = filter_input(INPUT_POST, 'tempoExp');
$ref = filter_input(INPUT_POST, 'ref');
$sobre = filter_input(INPUT_POST, 'sobre');
$fk_idFxEtaria = filter_input(INPUT_POST, 'fk_idFxEtaria');
$valor = filter_input(INPUT_POST, 'valor');
$dia = filter_input(INPUT_POST, 'dia[]');
$turno = filter_input(INPUT_POST,'turno[]');

$cadastroBabaSQL = $pdo->prepare("INSERT INTO baba (tempoExp,ref, sobre, fk_idFxEtaria, valor,  pk_idUsuario) VALUES (:tempoExp, :ref, :sobre, :fk_idFxEtaria, :valor,  :idUsuario);");

$cadastroBabaSQL->bindValue(':tempoExp', $tempoExp);
$cadastroBabaSQL->bindValue(':ref', $ref);
$cadastroBabaSQL->bindValue(':sobre', $sobre);
$cadastroBabaSQL->bindValue(':fk_idFxEtaria', $fk_idFxEtaria);
$cadastroBabaSQL->bindValue(':valor', $valor);
$cadastroBabaSQL->bindValue(':dia[]', $dia);
$cadastroBabaSQL->bindValue(':turno[]', $turno);
$cadastroBabaSQL->bindValue(':idUsuario', $idUsuario);

$cadastroBabaSQL->execute();

header("Location: ../../usuario/select.php");









