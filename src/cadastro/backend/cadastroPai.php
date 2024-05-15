<?php

require '../../database/configu.php';

$idUsuario = $_COOKIE['idUsuario'];
$qtdecrianca = filter_input(INPUT_POST, 'qtdeCrianca');
$descricao = filter_input(INPUT_POST, 'descricao');

$cadastroPaiSQL = $pdo->prepare("INSERT INTO pais (qtdeCrianca, descricao, pk_idUsuario) VALUES (:qtdeCrianca, :descricao, :idUsuario);");
$cadastroPaiSQL->bindValue(':qtdeCrianca', $qtdecrianca);
$cadastroPaiSQL->bindValue(':descricao', $descricao);
$cadastroPaiSQL->bindValue(':idUsuario', $idUsuario);

$cadastroPaiSQL->execute();

header("Location: ../../usuario/select.php");