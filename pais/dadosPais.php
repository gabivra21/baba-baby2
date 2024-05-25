<?php
include_once '../conn.php';
session_start();

if ((!isset($_SESSION['idUsuario'])) AND (!isset($_SESSION['nome']))) {
    $_SESSION['msgErro'] = "Necessário realizar o login para acessar a página!";
    header("Location: index.php");
    exit();
}

$idUsuario = $_SESSION['idUsuario'];

    try {
        //Passo 1: Obter o idPais correspondente ao usuário logado
        $sql_check = $pdo->prepare("SELECT idPais FROM pais WHERE pk_idUsuario = :idUsuario");
        $sql_check->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $sql_check->execute();
        $result = $sql_check->fetch(PDO::FETCH_ASSOC);
    
       if ($result) {
         $idPais = $result['idPais'];
        } else {
          echo "Pai não encontrado para o usuário logado.";
          exit(); // Saia do script, já que não temos o idBaba
        } }
        catch (PDOException $e) {
            die("Erro ao processar dados: " . $e->getMessage());
       }
        
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Baba Baby</title>
        <link rel="shortcut icon" type="imagex/png" href="../imgIndex/bbbyynew.ico">
        <link rel="stylesheet" href="menuPais.css">
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
            <a href="../menuPais.php" class="sidebar-nav"><i class="icon fa-solid fa-house" style="color: #000000;"></i><span>Início</span></a>
            <a href="pais/dadosPais.php" class="sidebar-nav active"><i class="icon fa-solid fa-user" style="color: #000000;"></i><span>Dados</span></a>     
            <a href="#" class="sidebar-nav"><i class="icon fa-solid fa-clock-rotate-left" style="color: #000000;"></i><span>Propostas</span></a>        
            <a href="../login/sair.php" class="sidebar-nav"><i class="icon fa-solid fa-right-from-bracket" style="color: #e90c0c;"></i><span>Sair</span></a>
            </div>
            <!-- Fim Sidebar -->

            <!-- Início do conteúdo do administrativo -->
            <div class="wrapper">
                <div class="row">
                    <div class="top-list">
                        <span class="title-content">Meus Dados</span>
                        <div class="top-list-right">
                            <button type="button" onclick="window.location.href='editarBaba.php'" class="botao-editar">Editar Dados</button>
                            <button type="button" class="botao-remover" id="openModalBtn">Apagar Conta</button>
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
                            <span class="view-adm-title">E-mail: </span>
                            <span class="view-adm-info">juliacosta@hotmail.com </span>
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
                            <span class="view-adm-info">Educada e legal </span>
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Faixa etária: </span>
                            <span class="view-adm-info">bebe </span>
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Telefone: </span>
                            <span class="view-adm-info">(xx) xxxxx-xxxx </span>
                        </div>
                        
                        <div class="view-det-adm">
                            <span class="view-adm-title">CEP </span>
                            <span class="view-adm-info">xxxxx-xxx </span>
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Valor Hora: </span>
                            <span class="view-adm-info">55 </span>
                        </div>
                    </div>
                </div>
            </div>    
            <!-- Fim do conteúdo do administrativo -->
        </div>
        <!-- Fim Conteúdo -->

        <div id="myModal" class="modal2">
        <!-- Conteúdo do modal -->
        <div class="modal2-content">
            <span class="close">&times;</span>
            <p class ="view-adm-title">Você tem certeza que deseja apagar sua conta?</p>
            <p>ATENÇÃO: essa ação não pode ser desfeita!</p>
            <form method="POST" action="deletarPais.php">
                <input type="hidden" name="idPais" value="<?php echo $idPais; ?>">
                <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
                <button type="submit" class="botao-editar">Sim, desejo excluir minha conta.</button>
            </form>
                <button type="button" onclick="closeModal()" class="botao-remover">Não, não desejo excluir minha conta.</button>
        </div>
        </div>

        <script>
            // Pega o modal
var modal = document.getElementById("myModal");

// Pega o botão que abre o modal
var btn = document.getElementById("openModalBtn");

// Pega o elemento <span> que fecha o modal
var span = document.getElementsByClassName("close")[0];

// Quando o usuário clicar no botão, abre o modal
btn.onclick = function() {
    modal.style.display = "block";
}

// Quando o usuário clicar no <span> (x), fecha o modal
span.onclick = function() {
    modal.style.display = "none";
}

function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }

// Quando o usuário clicar fora do modal, fecha-o
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

        </script>

    


    </body>
</html>