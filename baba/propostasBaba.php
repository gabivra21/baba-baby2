<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu Admin</title>
        <link rel="shortcut icon" type="imagex/png" href="imgIndex/bbbyynew.ico">
        <link rel="stylesheet" href="baba/menuBaba.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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
        </nav>
        <!-- Fim Navbar -->

        <!-- Início Conteúdo -->
        <div class="content">
            <!-- Início Sidebar -->
            <div class="sidebar">
                <a href="menuBaba.php" class="sidebar-nav"><i class="icon fa-solid
                    fa-house" style="color: #000000;"></i><span>Início</span></a>

                <a href="baba\dadosBaba.php" class="sidebar-nav"><i class="icon fa-solid 
                    fa-user" style="color: #000000;"></i><span>Dados</span></a>     
                
                <a href="baba\servicosBaba.php" class="sidebar-nav active"><i class="icon fa-solid 
                    fa-clock-rotate-left" style="color: #000000;"></i><span>Serviços</span></a>        
                    
                <a href="index.php" class="sidebar-nav"><i class="icon fa-solid 
                    fa-right-from-bracket" style="color: #e90c0c;"></i><span>Sair</span></a>
                
            </div>
            
            <!-- Início do conteúdo do administrativo -->
            <div class="wrapper">
                <div class="row">
                    <div class="top-list">
                        <span class="title-content">Propostas de Serviços</span>
                        <div class="top-list-right">
                        </div>
                    </div>
                    <table class="table-list">
                        <thead class="list-head">
                            <tr>
                                <th class="list-head-content">Solicitante</th>
                                <th class="list-head-content">Data</th>
                                <th class="list-head-content">Ações</th>
                            </tr>

                        </thead>
                        <tbody class="list-body">
                            <tr>
                                <td class="list-body-content">Carlos Silva</td>
                                <td class="list-body-content">11/05/2023</td>
                                <td class="list-body-content">
                                    <button type="button" class="botao-visualizar">Visualizar</button>
                                </td>
                            </tr>

                            <tr>
                                <td class="list-body-content">Luana Mello</td>
                                <td class="list-body-content">13/03/2023</td>
                                <td class="list-body-content">
                                    <button type="button" class="botao-visualizar">Visualizar</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="list-body-content">Luciana Gonçalves</td>
                                <td class="list-body-content">11/07/2023</td>
                                <td class="list-body-content">
                                    <button type="button" class="botao-visualizar">Visualizar</button>
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