<?php
require '../database/configu.php';

/*update USUARIO*/
$id = filter_input(INPUT_POST, 'idUsuario');
$nome = filter_input(INPUT_POST, 'nome');
$sobrenm = filter_input(INPUT_POST, 'sobrenome');
$tel = filter_input(INPUT_POST, 'telefone');
$endereco = filter_input(INPUT_POST, 'endereco');
$cidade = filter_input(INPUT_POST, 'cidade');
$email = filter_input(INPUT_POST, 'email');
$senha = filter_input(INPUT_POST, 'senha');

if ($id && $nome && $sobrenm && $tel && $endereco && $cidade && $email && $senha){
    $sql = $pdo->prepare("UPDATE usuario SET nome = :nome, sobrenome = :sobrenome, telefone = :telefone, endereco = :endereco, cidade = :cidade, email = :email, senha = :senha WHERE idUsuario = :idUsuario");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':sobrenome', $sobrenm);
    $sql->bindValue(':telefone', $tel);
    $sql->bindValue(':endereco', $endereco);
    $sql->bindValue(':cidade', $cidade);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':senha', $senha);
    $sql->bindValue(':idUsuario', $id);
    $sql->execute();

    header("Location: select.php");
    exit();
}else{
    header("Location: select.php");
    exit();
}