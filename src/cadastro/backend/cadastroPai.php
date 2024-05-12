<?php

require '../cadastro.php';

try {
    $cadastroUsuarioSQL->execute();
    $idUsuario = $pdo->lastInsertId();
    
    $qtdecrianca = filter_input(INPUT_POST, 'qtdeCrianca');
    $descricao = filter_input(INPUT_POST, 'descricao');
    $idUsuario = filter_input(INPUT_POST, 'fk_idUsuario');                    

    $cadastroPaiSQL = $pdo->prepare("INSERT INTO pais (qtdeCrianca, descricao, fk_idUsuario) VALUES (:qtdeCrianca, :descricao, :idUsuario);");
    $cadastroPaiSQL->bindValue(':qtdeCrianca', $qtdecrianca);
    $cadastroPaiSQL->bindValue(':descricao', $descricao);
    $cadastroPaiSQL->bindValue(':idUsuario', $idUsuario);                                    

    $cadastroPaiSQL->execute();
    $pdo->commit();
    header("Location: ../../usuario/select.php");
} catch (\PDOException $e) {
    echo"Error: ". $e->getMessage();
    $pdo->rollback();
}
