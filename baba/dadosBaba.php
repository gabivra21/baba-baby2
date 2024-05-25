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
        // Passo 1: Obter o idBaba correspondente ao usuário logado
        $sql_check = $pdo->prepare("SELECT idBaba FROM baba WHERE pk_idUsuario = :idUsuario");
        $sql_check->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $sql_check->execute();
        $result = $sql_check->fetch(PDO::FETCH_ASSOC);
    
        if ($result) {
            // Se encontrar o idBaba, armazene-o em $idBaba
            $idBaba = $result['idBaba'];
             $sql_user = $pdo->prepare("SELECT * FROM usuario WHERE idUsuario = :idUsuario");
             $sql_user->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
             $sql_user->execute();
             $user_data = $sql_user->fetch(PDO::FETCH_ASSOC);
             if($user_data) {
                $sql_baba = $pdo->prepare("SELECT tempoExp, ref, sobre, valor FROM baba WHERE idBaba = :idBaba");
                $sql_baba->bindValue(':idBaba', $idBaba, PDO::PARAM_INT);
                $sql_baba->execute();
                $user_data_baba = $sql_baba->fetch(PDO::FETCH_ASSOC);
             } else {
                echo "Pai sei la";
             }
        } else {
            // Caso não encontre, você precisa decidir o que fazer, talvez exibir uma mensagem de erro ou redirecionar
            echo "Baba não encontrada para o usuário logado.";
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
        <title>Menu Admin</title>
        <link rel="shortcut icon" type="imagex/png" href="../imgIndex/bbbyynew.ico">
        <link rel="stylesheet" href="menuBaba.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
     </head>
    <body>
        <!-- Início Navbar -->
        <nav class="navbar">
            <div class="navbar-content">

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
                        <span class="title-content">Meus Dados</span>
                        <div class="top-list-right">
                            <button type="button" onclick="window.location.href='editarBaba.php'" class="botao-editar">Editar Dados</button>
                            <button type="button" class="botao-remover" id="openModalBtn">Apagar Conta</button>
                        </div>
    
                    </div>
                    <div class="content-adm">
                        <div class="view-det-adm">
                            <span class="view-adm-title">CPF: </span>
                            <span class="view-adm-info"><?php echo htmlspecialchars($user_data['cpf']); ?></span>
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Nome: </span>
                            <span class="view-adm-info"><?php echo htmlspecialchars($user_data['nome']), " ", htmlspecialchars($user_data['sobrenome']); ?></span>
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">E-mail: </span>
                            <span class="view-adm-info"><?php echo htmlspecialchars($user_data['email']); ?></span>
                        </div>
                        
                        <div class="view-det-adm">
                            <span class="view-adm-title">Data de Nascimento: </span>
                            <span class="view-adm-info"><?php echo htmlspecialchars($user_data['dtaNascimento']); ?></span>
                        </div>
                    
                        <div class="view-det-adm">
                            <span class="view-adm-title">Telefone: </span>
                            <span class="view-adm-info"><?php echo htmlspecialchars($user_data['telefone']); ?></span>
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Telefone para contato: </span>
                            <span class="view-adm-info"><?php echo htmlspecialchars($user_data_baba['ref']); ?></span>
                        </div>
                        
                        <div class="view-det-adm">
                            <span class="view-adm-title">Cidade: </span>
                            <span class="view-adm-info"><?php echo htmlspecialchars($user_data['cidade']); ?></span>
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Endereço: </span>
                            <span class="view-adm-info"><?php echo htmlspecialchars($user_data['endereco']); ?></span>
                        </div>
                    
                        <div class="view-det-adm">
                            <span class="view-adm-title">Babá desde: </span>
                            <span class="view-adm-info"><?php echo htmlspecialchars($user_data_baba['tempoExp']); ?></span>
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Sobre: </span>
                            <span class="view-adm-info"><?php echo htmlspecialchars($user_data_baba['sobre']); ?></span>
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Faixa etária: </span>
                            <span class="view-adm-info"><p>Bebe</p></span>
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Valor Hora: </span>
                            <span class="view-adm-info"><?php echo "R$", htmlspecialchars($user_data_baba['valor']); ?></span>
                        </div>
                    </div>
                </div>
            </div>    
            <!-- Fim do conteúdo do administrativo -->
        </div>
        <!-- Fim Conteúdo -->

        <div id="myModal" class="modal">
        <!-- Conteúdo do modal -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p class ="view-adm-title">Você tem certeza que deseja apagar sua conta?</p>
            <p>ATENÇÃO: essa ação não pode ser desfeita!</p>
            <form method="POST" action="deletarBaba.php">
                <input type="hidden" name="idBaba" value="<?php echo $idBaba; ?>">
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