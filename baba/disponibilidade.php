<?php

include_once 'C:\xampp\htdocs\baba-baby2\conn.php';

//if((!isset($_SESSION['idUsuario'])) AND (!isset($_SESSION['nome']))){
  //  $_SESSION['msgErro'] = "Necessário realizar o login para acessar a página!";
    //header("Location: index.php");
//}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu Baba</title>
        <link rel="shortcut icon" type="imagex/png" href="../imgIndex/bbbyynew.ico">
        <link rel="stylesheet" href="../baba/menuBaba.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
     </head>
    <body>
        <!-- Início Navbar -->
        <nav class="navbar">
            <div class="navbar-content">
                <div class="bars">
                    <i class="fa-solid fa-bars" style="color: #000000;"></i>
                </div>
                <img src="../imgIndex/Babababypng.png" alt="Logo BabáBaby" class="logo-img">
            </div>
            <div class="navbar-ola">
                <p>Olá, <?php echo $_SESSION['nome']; ?></p>
            </div>
        </nav>

        <div class="content">
            <div class="sidebar">
                <a href="../menuBaba.php" class="sidebar-nav"><i class="icon fa-solid
                    fa-house" style="color: #000000;"></i><span>Início</span></a>

                <a href="dadosBaba.php" class="sidebar-nav"><i class="icon fa-solid 
                    fa-user" style="color: #000000;"></i><span>Dados</span></a>     
                
                <a href="servicosBaba.php" class="sidebar-nav"><i class="icon fa-solid 
                    fa-clock-rotate-left" style="color: #000000;"></i><span>Serviços</span></a>        
                    
                <a href="login/sair.php" class="sidebar-nav"><i class="icon fa-solid 
                    fa-right-from-bracket" style="color: #e90c0c;"></i><span>Sair</span></a>       
            </div>
                <!-- Início do conteúdo do administrativo -->
            <div class="wrapper">
                <div class="row">
                    <div class="top-list">
                        <span class="title-content">Sua disponibilidade de horários</span>
                        <div class="top-list-right">
                            <button type="button" class="botao-adicionar">Adicionar disponibilidade</button>
                            <button type="button" class="botao-remover">Remover disponibilidade</button>
                        </div>
                    </div>
                    <table class="table-list">
                        <thead class="list-head">
                            <tr>
                                <th class="list-head-content">Dia da semana</th>
                                <th class="list-head-content">Turno</th>
                            </tr>

                        </thead>
                        <tbody class="list-body">
                            <tr>
                                <td class="list-body-content">Terça-feira</td>
                                <td class="list-body-content">Manhã / Tarde</td>
                            </tr>
                            <tr>
                                <td class="list-body-content">Quarta-feira</td>
                                <td class="list-body-content">Manhã / Tarde</td>
                                </td>
                            </tr>

                        </tbody>

                    </table>
                </div>
            </div>
            <!-- Fim do conteúdo do administrativo -->
        </div>

        <!-- Fim Conteúdo -->
    </body>
</html>