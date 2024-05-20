<?php

include_once 'C:\xampp\htdocs\baba-baby2\conn.php';

//if((!isset($_SESSION['idUsuario'])) AND (!isset($_SESSION['nome']))){
   // $_SESSION['msgErro'] = "Necessário realizar o login para acessar a página!";
   // header("Location: index.php");
//}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu Administrador</title>
        <link rel="shortcut icon" type="imagex/png" href="imgIndex/bbbyynew.ico">
        <link rel="stylesheet" href="admin\menuAdmin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
     </head>
    <body>
        <!-- Início Navbar -->
        <nav class="navbar">
            <div class="navbar-content">
                <img src="imgIndex/Babababypng.png" alt="Logo BabáBaby" class="logo-img">
            </div>
            <div class="navbar-ola">
                <p>Olá, Administrador <?php echo $_SESSION['nome']; ?></p>
            </div>
        </nav>
        <!-- Fim Navbar -->

        <!-- Início Conteúdo -->
        <div class="content">
            <!-- Início Sidebar -->
            <div class="sidebar">
                <a href="menuAdmin.php" class="sidebar-nav active"><i class="icon fa-solid
                    fa-house" style="color: #000000;"></i><span>Início</span></a>

                <a href="admin\listaUsuario.php" class="sidebar-nav"><img src="imgIndex/lista.png" img weight="27px" img height="26px" class="listaimg"><span>Listar</span></a>      
                    
                <a href="login/sair.php" class="sidebar-nav"><i class="icon fa-solid 
                    fa-right-from-bracket" style="color: #e90c0c;"></i><span>Sair</span></a> 
            </div>
            <!-- Fim Sidebar -->

            <!-- Início do conteúdo do administrativo -->
            <div class="wrapper">
                <div class="row">
                    <a href="admin\listaUsuario.php" class="box box-first">
                        <span><img src="imgIndex/user.png" img width="25px"></span>
                        <span></span>
                        <span>Usuários</span>
                    </a>
                
                    <a href="admin\verificacao.php" class="box box-second">
                        <span><img src="imgIndex/check.png"></span>
                        <span></span>
                        <span>Verificação</span>
                    </a>
            </div>
            <!-- Fim do conteúdo do administrativo -->
        </div>
        <!-- Fim Conteúdo -->
    


    </body>
</html>
<!-- <h1>Bem-vindo, admin <?php //echo $_SESSION['nome']; ?></h1>