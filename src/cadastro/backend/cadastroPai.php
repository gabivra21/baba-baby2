<?php

require '../../database/configu.php';

$idUsuario = $pdo->lastInsertId();
$value = $idUsuario;
setcookie("CookieTeste", $value);
setcookie("CookieTeste", $value, time() +3600 );
//setcookie("CookieTeste", $value, time() +3600,"/baba-baby2/src/cadastro/", "localhost", 1);

print_r($_COOKIE);




$idUsuario = $_COOKIE['CookieTeste'];
$qtdeCrianca = filter_input(INPUT_POST, 'qtdeCrianca');
$descricao = filter_input(INPUT_POST, 'descricao');

$cadastroPaiSQL = $pdo->prepare("INSERT INTO pais (qtdeCrianca, descricao, pk_idUsuario) VALUES (:qtdeCrianca, :descricao, :idUsuario);");
$cadastroPaiSQL->bindValue(':qtdeCrianca', $qtdeCrianca);
$cadastroPaiSQL->bindValue(':descricao', $descricao);
$cadastroPaiSQL->bindValue(':idUsuario', $idUsuario);

$cadastroPaiSQL->execute();

header("Location: ../../usuario/select.php");

?>