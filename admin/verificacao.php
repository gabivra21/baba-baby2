<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu Administrador</title>
        <link rel="shortcut icon" type="imagex/png" href="../imgIndex/bbbyynew.ico">
        <link rel="stylesheet" href="menuAdmin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
     </head>
    <body>

        <nav class="navbar">
            <div class="navbar-content">
                <img src="../imgIndex/Babababypng.png" alt="Logo BabáBaby" class="logo-img">
            </div>
        </nav>

        <div class="content">
            <div class="sidebar">
                <a href="../menuAdmin.php" class="sidebar-nav active"><i class="icon fa-solid
                    fa-house" style="color: #000000;"></i><span>Início</span></a>

                <a href="listaUsuario.php" class="sidebar-nav"><img src="../imgIndex/lista.png" img weight="27px" img height="26px" class="listaimg"><span>Listar</span></a>      
        
                <a href="../index.php" class="sidebar-nav"><i class="icon fa-solid 
                    fa-right-from-bracket" style="color: #e90c0c;"></i><span>Sair</span></a>
            </div>

            <div class="wrapper">
                <div class="row">
                    <div class="top-list">
                        <span class="title-content">Verificações Pendentes</span>
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
                                <th class="list-head-content">Ações</th>
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
                                <td class="list-body-content">
                                    <button type="button" class="botao-verificar">Verificar documentos</button>
                                </td>
                            </tr>

                            <tr>
                                <td class="list-body-content">1010</td>
                                <td class="list-body-content">Bruna Menezes</td>
                                <td class="list-body-content">123.456.181-24</td>
                                <td class="list-body-content">08/08/1998</td>
                                <td class="list-body-content">brunamnz@gmail.com</td>
                                <td class="list-body-content">(49) 4233-5678</td>
                                <td class="list-body-content">São Paulo</td>
                                <td class="list-body-content">
                                    <button type="button" class="botao-verificar">Verificar documentos</button>
                                </td>                            
                            </tr>

                            <tr>
                                <td class="list-body-content">1011</td>
                                <td class="list-body-content">Gabriela Vieira</td>
                                <td class="list-body-content">123.422.781-53</td>
                                <td class="list-body-content">08/01/1999</td>
                                <td class="list-body-content">gabrvieira@icloud.com</td>
                                <td class="list-body-content">(49) 4223-5688</td>
                                <td class="list-body-content">Curitiba</td>
                                <td class="list-body-content">
                                    <button type="button" class="botao-verificar">Verificar documentos</button>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </body>
</html>