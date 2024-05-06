<?php
    require 'configu.php';
    /*delete PAIS*/
    $id = filter_input(INPUT_GET, 'idPais');
    $sql = $pdo->prepare("DELETE FROM pais WHERE idPais = :idPais");
    $sql->bindValue(':idPais', $id);
    $sql->execute();
    header("Location: selectPAIS.php");
?>
