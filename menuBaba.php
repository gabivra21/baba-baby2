<?php

include_once 'C:\xampp\htdocs\baba-baby2\conn.php';
//session_start();

if ((!isset($_SESSION['idUsuario'])) AND (!isset($_SESSION['nome']))) {
    $_SESSION['msgErro'] = "Necessário realizar o login para acessar a página!";
    header("Location: index.php");
   exit();
}

$idUsuario = $_SESSION['idUsuario']; // Usuário logado
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu Baba</title>
        <link rel="shortcut icon" type="imagex/png" href="../imgIndex/bbbyynew.ico">
        <link rel="stylesheet" href="baba/menuBaba.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <link rel="stylesheet" href="baba/componente/babaNaoAprovada.css">
     </head>
    <body>
        <!-- Início Navbar -->
        <nav class="navbar">
            <div class="navbar-content">
                <div class="bars">
                    <i class="fa-solid fa-bars" style="color: #000000;"></i>
                </div>
                <img src="imgIndex/Babababypng.png" alt="Logo BabáBaby" class="logo-img">
            </div>
            <div class="navbar-ola">
                <p>Olá, <?php echo $_SESSION['nome']; ?></p>
            </div>
        </nav>
        <?php require 'baba/componente/validarAprovacao.php' ?>
        <script src="baba/componente/babaNaoAprovada.js"></script>
    </body>
</html>