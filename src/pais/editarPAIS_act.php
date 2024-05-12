<?php
require 'configu.php';

/*update PAIS*/
$id = filter_input(INPUT_POST, 'idPais');
$endereco = filter_input(INPUT_POST, 'endereco');
$qtdecrianca = filter_input(INPUT_POST, 'qtdeCrianca');
$descricao = filter_input(INPUT_POST, 'descricao');

if ($id && $endereco && $qtdecrianca && $descricao){
    $sql = $pdo->prepare("UPDATE pais SET endereco = :endereco, qtdeCrianca = :qtdeCrianca, descricao = :descricao WHERE idPais = :idPais");
    $sql->bindValue(':endereco', $endereco);
    $sql->bindValue(':qtdeCrianca', $qtdecrianca);
    $sql->bindValue(':descricao', $descricao);
    $sql->bindValue(':idPais', $id);
    $sql->execute();

    header("Location: selectPAIS.php");
    exit();
}else{
    header("Location: selectPAIS.php");
    exit();
}