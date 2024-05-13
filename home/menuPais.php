<?php
include_once 'C:\xampp\htdocs\baba-baby2\conn.php';

define("BASE_URL","http://localhost/baba-baby2/");
define("BASE_URL_INDEX","http://localhost/baba-baby2/index.php");

if((!isset($_SESSION['idUsuario'])) AND (!isset($_SESSION['nome']))){
    $_SESSION['msgErro'] = "Necessário realizar o login para acessar a página!";
    header("Location:".BASE_URL_INDEX);
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu Pais</title>
    </head>
    <body>
        <h1>Bem-vindo, <?php echo $_SESSION['nome']; ?></h1>
        <a href="sair.php">Sair</a>
    </body>
</html>