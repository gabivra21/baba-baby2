<?php
require 'C:\xampp\htdocs\baba-baby2\conn.php';

$data = filter_input(INPUT_POST, 'dateInput');
$turno = filter_input(INPUT_POST, 'turno');

$sql = $pdo->prepare("INSERT INTO proposta () VALUES (:)");
$sql->bindValue(':cpf', $cpf);
$sql->bindValue(':nome', $nome);

$sql->execute();
$idUsuario = $pdo->lastInsertId();
$url = "Location: ";
header();