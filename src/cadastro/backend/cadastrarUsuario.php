<?php

require "../../database/configu.php";

$name = filter_input(INPUT_POST, "name");
$sobrenome = filter_input(INPUT_POST, "sobrenome");
$dtaNascimento = filter_input(INPUT_POST, "dtaNascimento");
$cpf = filter_input(INPUT_POST, "cpf");
$telefone = filter_input(INPUT_POST, "telefone");
$cidade = filter_input(INPUT_POST, "cidade");
$endereco = filter_input(INPUT_POST, "endereco");
$email = filter_input(INPUT_POST, "email");
$senha = filter_input(INPUT_POST, "senha");

$cpf = str_replace("-", "", str_replace(".", "", $cpf));


$cadastroUsuarioSQL = $pdo->prepare("INSERT INTO usuario (cpf, nome, sobrenome, dtaNascimento, telefone, endereco, cidade, email, senha) VALUES (:cpf, :nome, :sobrenome, :dtaNascimento, :telefone, :endereco, :cidade, :email, :senha)");
$cadastroUsuarioSQL->bindValue(':cpf', $cpf);
$cadastroUsuarioSQL->bindValue(':nome', $name);
$cadastroUsuarioSQL->bindValue(':sobrenome', $sobrenome);
$cadastroUsuarioSQL->bindValue(':dtaNascimento', $dtaNascimento);
$cadastroUsuarioSQL->bindValue(':telefone', $telefone);
$cadastroUsuarioSQL->bindValue(':endereco', $endereco);
$cadastroUsuarioSQL->bindValue(':cidade', $cidade);
$cadastroUsuarioSQL->bindValue(':email', $email);
$cadastroUsuarioSQL->bindValue(':senha', $senha);

$cadastroUsuarioSQL->execute();
setcookie("idUsuario", $pdo->lastInsertId(), time() + 3600);
// $url = "Location: ../cadastro.php?idUsuario=" . $idUsuario;
// header($url);


