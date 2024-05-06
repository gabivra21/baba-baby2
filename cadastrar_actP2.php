<?php
require 'configu.php';

/*include baba*/
$endereco = filter_input(INPUT_POST, 'endereco');
$qtdecrianca = filter_input(INPUT_POST, 'qtdeCrianca');
$descricao = filter_input(INPUT_POST, 'descricao');
$idUsuario = filter_input(INPUT_POST, 'fk_idUsuario');                    

$sql = $pdo->prepare("INSERT INTO pais (endereco, qtdeCrianca, descricao, fk_idUsuario) VALUES (:endereco, :qtdeCrianca, :descricao, :idUsuario);");
$sql->bindValue(':endereco', $endereco);
$sql->bindValue(':qtdeCrianca', $qtdecrianca);
$sql->bindValue(':descricao', $descricao);
$sql->bindValue(':idUsuario', $idUsuario);                                    

$sql->execute();
header("Location: select.php");