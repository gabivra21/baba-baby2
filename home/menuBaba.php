<?php
session_start();
include_once 'C:\xampp\htdocs\baba-baby2\conn.php';

if((!isset($_SESSION['idUsuario'])) AND (!isset($_SESSION['nome']))){
    $_SESSION['msgErro'] = "Necessário realizar o login para acessar a página!";
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu Babá</title>
    </head>
    <body>
        <h1>Bem-vindo, <?php echo $_SESSION['nome']; ?></h1>
        <a href="sair.php">Sair</a>
    </body>
</html>