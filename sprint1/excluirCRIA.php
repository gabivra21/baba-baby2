<?php
    require 'configu.php';
    /*delete crianca*/
    $id = filter_input(INPUT_GET, 'idCrianca');
    $sql = $pdo->prepare("DELETE FROM crianca WHERE idCrianca = :idCrianca");
    $sql->bindValue(':idCrianca', $id);
    $sql->execute();
    header("Location: selectCRIA.php");
?>
