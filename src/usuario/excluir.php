<?php
    require 'C:\xampp\htdocs\baba-baby2\conn.php';
    /*delete*/
    $id = filter_input(INPUT_GET, 'idUsuario');
    $sql = $pdo->prepare("DELETE FROM usuario WHERE idUsuario = :idUsuario");
    $sql->bindValue(':idUsuario', $id);
    try{
        $sql->execute();
    }catch(PDOException $e){
        $erro = 1;
    }
    header("Location: select.php?erro=".$erro);
?>