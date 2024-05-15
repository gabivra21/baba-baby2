<?php

require '../../database/configu.php';
require '../../componente/diasSemana.php/';
require "../../componente/horarios.php";


$idUsuario = $_COOKIE['idUsuario'];
$tempoExp = filter_input(INPUT_POST, 'tempoExp');
$ref = filter_input(INPUT_POST, 'ref');
$sobre = filter_input(INPUT_POST, 'sobre');
$fk_idFxEtaria = filter_input(INPUT_POST, 'fk_idFxEtaria');
$valorH = filter_input(INPUT_POST, 'valorH');
$dia = filter_input(INPUT_POST, 'dia[]');
$turno = filter_input(INPUT_POST,'turno[]');

$cadastroBabaSQL = $pdo->prepare("INSERT INTO baba (tempoExp,ref, sobre, fk_idFxEtaria, valorH, dia[], turno[], pk_idUsuario) VALUES (:tempoExp, :ref, :sobre, :fk_idFxEtaria, :valorH, :dia[], :turno[] :idUsuario);");

$cadastroBabaSQL->bindValue(':tempoExp', $tempoExp);
$cadastroBabaSQL->bindValue(':ref', $ref);
$cadastroBabaSQL->bindValue(':sobre', $sobre);
$cadastroBabaSQL->bindValue(':fk_idFxEtaria', $fk_idFxEtaria);
$cadastroBabaSQL->bindValue(':valorH', $valorH);
$cadastroBabaSQL->bindValue(':dia[]', $dia);
$cadastroBabaSQL->bindValue(':turno[]', $turno);
$cadastroBabaSQL->bindValue(':idUsuario', $idUsuario);

$cadastroBabaSQL->execute();

header("Location: ../../usuario/select.php");









