<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu Admin</title>
        <link rel="shortcut icon" type="imagex/png" href="../imgIndex/bbbyynew.ico">
        <link rel="stylesheet" href="menuBaba.css">
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
        </nav>
        <!-- Fim Navbar -->

        <!-- Início Conteúdo -->
        <div class="content">
            <!-- Início Sidebar -->
            <div class="sidebar">
                <a href="../menuBaba.php" class="sidebar-nav"><i class="icon fa-solid
                    fa-house" style="color: #000000;"></i><span>Início</span></a>

                <a href="dadosBaba.php" class="sidebar-nav active"><i class="icon fa-solid 
                    fa-user" style="color: #000000;"></i></i><span>Dados</span></a>
                    
                <a href="servicosBaba.php" class="sidebar-nav"><i class="icon fa-solid 
                    fa-clock-rotate-left" style="color: #000000;"></i><span>Serviços</span></a>        
                            

                <a href="../index.php" class="sidebar-nav"><i class="icon fa-solid 
                    fa-right-from-bracket" style="color: #e90c0c;"></i></i><span>Sair</span></a>        
                
            </div>
            <!-- Fim Sidebar -->

            <!-- Início do conteúdo do administrativo -->
            <div class="wrapper">
                <div class="row">
                    <div class="top-list">
                        <span class="title-content">Editar Dados</span>
                        <div class="top-list-right">
                            <button type="button" onclick="window.location.href='editarBaba.php'" class="botao-editar">Confirmar</button>
                            <button type="button" onclick="window.location.href='dadosBaba.php'" class="botao-remover">Voltar</button>
                        </div>

                        <div class="fade hide"></div>
                        <div class="modal hide">
                            <!-- Cabeçalho do Modal -->
                            <div class="modal-header">
                                <ul>
                                    <li class="nome"></li>
                                    <li>Babá desde: </li>
                                    <li>Valor/turno: R$</li>
                                </ul>
                                <button class="close-modal">x</button>
                            </div>
                            <!-- Corpo do Modal -->
                            <div class="modal-body"> 
                                <div class="about">
                                    <h3>Sobre mim:</h3>
                                </div>
                                <!-- Disponibilidade da Babá -->
                                <div class="dispo">
                                    <h3>Disponibilidade:</h3>
                                    <p></p><br>
                                </div>
                                <!-- Formulário de Proposta -->
                            </div>
                            </div>
    
                    </div>
                    <div class="content-adm">
                        <div class="view-det-adm">
                            <span class="view-adm-title">CPF: </span>
                            <span class="view-adm-info">145.785.569-99 </span>
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Nome: </span>
                            <span class="view-adm-info">Julia Costa </span>
                        </div>

                        <div class="view-det-adm">
                        <span class="view-adm-title">Email:</span>
                        
                        <input class="preencher" id="email" type="email" name="email" placeholder="Email"
                        title="Email entre 10 e 50 letras, deve conter @." oninput="emailValidate()" />
                        </div>
                        
                        <div class="view-det-adm">
                            <span class="view-adm-title">Data de Nascimento </span>
                            <span class="view-adm-info">2005 </span>
                        </div>
                    
                        <div class="view-det-adm">
                            <span class="view-adm-title">Babá desde: </span>
                            <span class="view-adm-info">2005 </span>
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Sobre: </span>
                            <input class="preencher" type="text" placeholder="Fale um pouco sobre você" name="sobre"
                            title="Descreva um pouco sobre você e suas experiências." />
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Faixa etária: </span>
                            <select name="fk_idFxEtaria" class="preencher">
                            <option value="1">Bebê</option>
                            <option value="2">Criança</option>
                            <option value="3">Infantojuvenil</option>
                            <option value="4">Adolescente</option>
                            </select>
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Telefone: </span>
                            <input class="preencher" type="text" id="tel" name="telefone" placeholder="(00) 00000-0000" pattern="\d{2}\s?\d{4,5}-?\d{4}"
                            title="Formato: (XX) XXXX-XXXX ou (XX) XXXXX-XXXX." />
                        </div>
                        
                        <div class="view-det-adm">
                        <span class="view-adm-title">CEP: </span>
                            <input class="preencher" type="text" id="cpf" name="cpf" placeholder="000.000.000-00" pattern="\d{3}\.?\d{3}\.?\d{3}-?\d{2}"
                            title="Formato: XXX.XXX.XXX-XX"/>
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Valor Hora: </span>
                            <input class="preencher" type="text" placeholder="150,00" name="valor" pattern="\d+(\.\d+)?"
                            title="Insira um valor em reais (com ponto ao invés de vírgula!)" />
                        </div>
                    </div>
                </div>
            </div>    
            <!-- Fim do conteúdo do administrativo -->
        </div>
        <!-- Fim Conteúdo -->
    


    </body>
</html>