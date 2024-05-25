<?php

require 'C:\\xampp\\htdocs\\baba-baby2\conn.php';

$idUsuario = $_POST["idUsuario"];
$imgDocumento = $_FILES["foto"];

if ($imgDocumento != NULL) {
    $path = "C:/xampp/htdocs/baba-baby2/baba/imagensDocumentoBaba/";

    $pathFinal = $path.time().$imgDocumento["name"];

    if (move_uploaded_file($imgDocumento["tmp_name"], $pathFinal)) {
        $querySQL = "UPDATE baba SET foto_doc = '$pathFinal' WHERE pk_idUsuario = $idUsuario;";
        $queryPreparada = $pdo->prepare($querySQL);
        $queryPreparada->execute();
        header("location: $__DIR__/baba-baby2/menuBaba.php");
    } else {
        echo "DEU ERRO";
    }
}
