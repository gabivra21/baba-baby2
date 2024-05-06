<?php
require 'configu.php';

/*update USUARIO*/
$id = filter_input(INPUT_POST, 'idBaba');
$sobre = filter_input(INPUT_POST, 'sobre');
$valorh = filter_input(INPUT_POST, 'valorH');

if ($id && $sobre && $valorh){
    $sql = $pdo->prepare("UPDATE baba SET sobre = :sobre, valorH = :valorH WHERE idBaba = :idBaba");
    $sql->bindValue(':sobre', $sobre);
    $sql->bindValue(':valorH', $valorh);
    $sql->bindValue(':idBaba', $id);
    $sql->execute();

    header("Location: selectBABA.php");
    exit();
}else{
    header("Location: selectBABA.php");
    exit();
}