<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu Administrador</title>
        <link rel="shortcut icon" type="imagex/png" href="imgIndex/bbbyynew.ico">
        <link rel="stylesheet" href="admin/menuAdm.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
     </head>
    <body>
        <!-- Início Navbar -->
        <nav class="navbar">
            <div class="navbar-content">
                <img src="imgIndex/Babababypng.png" alt="Logo BabáBaby" class="logo-img">
            </div>
        </nav>
        <!-- Fim Navbar -->

        <!-- Início Conteúdo -->
        <div class="content">
            <!-- Início Sidebar -->
            <div class="sidebar">
                <a href="menuAdmin.php" class="sidebar-nav"><i class="icon fa-solid
                    fa-house" style="color: #000000;"></i><span>Início</span></a>

                <a href="admin\listaUsuario.php" class="sidebar-nav active"><img src="imgIndex/lista.png" img weight="27px" img height="26px" class="listaimg"><span>Listar</span></a>      
                    
                <a href="index.php" class="sidebar-nav"><i class="icon fa-solid 
                    fa-right-from-bracket" style="color: #e90c0c;"></i><span>Sair</span></a>

            </div>
            <div class="wrapper">
                <div class="row">
                    <div class="top-list">
                        <span class="title-content">Lista de Usuários</span>
                        <div class="top-list-right">
                        </div>
                    </div>
                    <table class="table-list">
                        <thead class="list-head">
                            <tr>
                                <th class="list-head-content">ID</th>
                                <th class="list-head-content">Nome</th>
                                <th class="list-head-content">CPF</th>
                                <th class="list-head-content">Data de Nascimento</th>
                                <th class="list-head-content">Email</th>
                                <th class="list-head-content">Telefone</th>
                                <th class="list-head-content">Cidade</th>
                                <th class="list-head-content">Tipo</th>
                            </tr>

                        </thead>
                        <tbody class="list-body">
                            <tr>
                                <td class="list-body-content">1001</td>
                                <td class="list-body-content">Laura da Silva</td>
                                <td class="list-body-content">123.456.781-23</td>
                                <td class="list-body-content">11/05/2000</td>
                                <td class="list-body-content">laurads@hotmail.com</td>
                                <td class="list-body-content">(41) 1234-5678</td>
                                <td class="list-body-content">Curitiba</td>
                                <td class="list-body-content">Babá</td>
                            </tr>

                            <tr>
                                <td class="list-body-content">1002</td>
                                <td class="list-body-content">Bruno Santos</td>
                                <td class="list-body-content">123.456.781-24</td>
                                <td class="list-body-content">02/01/1995</td>
                                <td class="list-body-content">brunosts@gmail.com</td>
                                <td class="list-body-content">(49) 1233-5678</td>
                                <td class="list-body-content">Florianópolis</td>
                                <td class="list-body-content">Pai</td>
                            </tr>

                            <tr>
                                <td class="list-body-content">1003</td>
                                <td class="list-body-content">Nicole Fatuch</td>
                                <td class="list-body-content">123.456.781-53</td>
                                <td class="list-body-content">04/09/2002</td>
                                <td class="list-body-content">nicfatuch@hotmail.com</td>
                                <td class="list-body-content">(49) 4423-5688</td>
                                <td class="list-body-content">Curitiba</td>
                                <td class="list-body-content">Pai</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>