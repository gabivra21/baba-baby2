<?php
require 'configu.php';

/*include pais(usuario)*/
$cpf = filter_input(INPUT_POST, 'cpf');
$nome = filter_input(INPUT_POST, 'nome');
$sobrenm = filter_input(INPUT_POST, 'sobrenome');
$dtanasc = filter_input(INPUT_POST, 'dtaNascimento');
$tel = filter_input(INPUT_POST, 'telefone');
$cep = filter_input(INPUT_POST, 'cep');
$email = filter_input(INPUT_POST, 'email');
$senha = filter_input(INPUT_POST, 'senha');

$cpf = str_replace("-","",str_replace(".","",$cpf));
$sql = $pdo->prepare("INSERT INTO usuario (cpf, nome, sobrenome, dtaNascimento, telefone, cep, email, senha) VALUES (:cpf, :nome, :sobrenome, :dtaNascimento, :telefone, :cep, :email, :senha)");
$sql->bindValue(':cpf', $cpf);
$sql->bindValue(':nome', $nome);
$sql->bindValue(':sobrenome', $sobrenm);
$sql->bindValue(':dtaNascimento', $dtanasc);
$sql->bindValue(':telefone', $tel);
$sql->bindValue(':cep', $cep);
$sql->bindValue(':email', $email);
$sql->bindValue(':senha', $senha);

$sql->execute();
$idUsuario = $pdo->lastInsertId();
$url = "Location: cadastrarPAIS2.php?idUsuario=".$idUsuario;
header($url);                                               