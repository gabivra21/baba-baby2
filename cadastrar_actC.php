<?php
require 'configu.php';

/*include criança*/
$sql = $pdo->query("SELECT * FROM crianca");
if($sql->rowCount() > 0){;
    $sobre= $sql->fetchAll(PDO::FETCH_ASSOC);
}

$nome = filter_input(INPUT_POST, 'nome');
$sexo = filter_input(INPUT_POST, 'sexo');
$idade = filter_input(INPUT_POST, 'idade');
$sobre = filter_input(INPUT_POST, 'fk_idSobre');

$sql = $pdo->prepare("INSERT INTO crianca (nome, sexo, idade, fk_idSobre) VALUES (:nome, :sexo, :idade, :fk_idSobre)");
$sql->bindValue(':nome', $nome);
$sql->bindValue(':sexo', $sexo);
$sql->bindValue(':idade', $idade);
$sql->bindValue(':fk_idSobre', $sobre);


$sql->execute();

header("Location: select.php");