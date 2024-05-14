<?php

require '../../database/configu.php';



if(isset($_FILES['foto'])){
    $foto = $_FILES['foto'];

    $pasta = "src\cadastro\arquivos";
    $nomeDaFoto = $foto['name'];
    $extensao = strtolower(pathinfo($nomeDaFoto, PATHINFO_EXTENSION));

    if($extensao != "jpg" && $extensao != "png")
        die('tipo de arquivo não aceito');

    
    $path = $pasta . $nomeDaFoto . "." . $extensao;
    $deu_certo = move_uploaded_file($foto["tmp_name"], $path);
    if($deu_certo)
        echo"arquivo enviado";
    else
        echo"falha";

}

$idUsuario = $_COOKIE[ 'idUsuario'];
$qtdecrianca = filter_input(INPUT_POST, 'qtdeCrianca');
$descricao = filter_input(INPUT_POST, 'descricao');

$cadastroPaiSQL = $pdo->prepare("INSERT INTO pais (qtdeCrianca, descricao, pk_idUsuario, foto) VALUES (:qtdeCrianca, :descricao, :idUsuario :foto);");
$cadastroPaiSQL->bindValue(':qtdeCrianca', $qtdecrianca);
$cadastroPaiSQL->bindValue(':descricao', $descricao);
$cadastroPaiSQL->bindValue(':idUsuario', $idUsuario);
$cadastrarPaiSQL->bindValue(':foto',$foto);

$cadastroPaiSQL->execute();

header("Location: ../../usuario/select.php");
