<?php
include_once '../conn.php';

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
        $sql_user = $pdo->prepare("SELECT * FROM usuario WHERE idUsuario = :idUsuario");
        $sql_user->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $sql_user->execute();
        $user_data = $sql_user->fetch(PDO::FETCH_ASSOC);
        if($user_data) {
            $sql_pai = $pdo->prepare("SELECT qtdeCrianca, descricao FROM pais WHERE idPais = :idPais");
            $sql_pai->bindValue(':idPais', $idPais, PDO::PARAM_INT);
            $sql_pai->execute();
            $user_data_pai = $sql_pai->fetch(PDO::FETCH_ASSOC);
        } else {
            echo "Pai não encontrado.";
            exit();
        }
    } else {
        echo "Pai não encontrado para o usuário logado.";
        exit();
    }
} catch (PDOException $e) {
    die("Erro ao processar dados: " . $e->getMessage());
}

// Se o formulário for submetido, processar as atualizações
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $ende = $_POST['endereco'];
    $senha = $_POST['senha'];
    $qtdeCrianca = $_POST['qtdeCrianca'];
    $descricao = $_POST['sobre'];

    try {
        $sql_update_user = $pdo->prepare("UPDATE usuario SET email = :email, telefone = :telefone, cidade = :cep, endereco = :endereco, senha = :senha WHERE idUsuario = :idUsuario");
        $sql_update_user->bindValue(':email', $email, PDO::PARAM_STR);
        $sql_update_user->bindValue(':telefone', $telefone, PDO::PARAM_STR);
        $sql_update_user->bindValue(':cep', $cep, PDO::PARAM_STR);
        $sql_update_user->bindValue(':endereco', $ende, PDO::PARAM_STR);
        $sql_update_user->bindValue(':senha', $senha, PDO::PARAM_STR);
        $sql_update_user->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $sql_update_user->execute();

        $sql_update_pai = $pdo->prepare("UPDATE pais SET qtdeCrianca = :qtdeCrianca, descricao = :descricao WHERE idPais = :idPais");
        $sql_update_pai->bindValue(':qtdeCrianca', $qtdeCrianca, PDO::PARAM_INT);
        $sql_update_pai->bindValue(':descricao', $descricao, PDO::PARAM_STR);
        $sql_update_pai->bindValue(':idPais', $idPais, PDO::PARAM_INT);
        $sql_update_pai->execute();

        echo "
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showModal2();
            });
    
            function showModal2() {
                var modal = document.createElement('div');
                modal.id = 'modal2';
                modal.style.display = 'block';
                modal.style.position = 'fixed';
                modal.style.zIndex = '1';
                modal.style.left = '0';
                modal.style.top = '0';
                modal.style.width = '100%';
                modal.style.height = '100%';
                modal.style.overflow = 'auto';
                modal.style.backgroundColor = 'rgba(0,0,0,0.4)';
                modal.innerHTML = `
                    <div style='background-color: #fefefe; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 80%; max-width: 300px; text-align: center;'>
                        <p>Dados Atualizados!</p>
                        <button type='button' onclick='redirect()' style='background-color: #4038db; color: #ffffff; padding: 8px 8px; border: none; border-radius: 5px; cursor: pointer; font-size: 15px; transition: all .3s ease; margin-top: 15px; margin-bottom: 10px;'>OK</button>
                    </div>`;
                document.body.appendChild(modal);
            }
    
            function redirect() {
                window.location.href = 'dadosPais.php';
            }
        </script>";
    } catch (PDOException $e) {
        die("Erro ao atualizar dados: " . $e->getMessage());
    }
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
    <nav class="navbar">
        <div class="navbar-content">
            <img src="../imgIndex/Babababypng.png" alt="Logo BabáBaby" class="logo-img">
        </div>
    </nav>

    <div class="content">
        <div class="sidebar">
            <a href="../menuPais.php" class="sidebar-nav"><i class="icon fa-solid fa-house" style="color: #000000;"></i><span>Início</span></a>
            <a href="dadosPais.php" class="sidebar-nav active"><i class="icon fa-solid fa-user" style="color: #000000;"></i><span>Dados</span></a>     
            <a href="#" class="sidebar-nav"><i class="icon fa-solid fa-clock-rotate-left" style="color: #000000;"></i><span>Propostas</span></a>        
            <a href="../login/sair.php" class="sidebar-nav"><i class="icon fa-solid fa-right-from-bracket" style="color: #e90c0c;"></i><span>Sair</span></a>
        </div>

        <div class="wrapper">
            <div class="row">
                <div class="top-list">
                    <span class="title-content">Editar Dados</span>
                    <div class="top-list-right">
                        <button type="button" class="botao-editar" id="openModalBtn">Confirmar</button>
                        <button type="button" onclick="window.location.href='dadosPais.php'" class="botao-remover">Voltar</button>
                    </div>
                </div>
                <div class="content-adm">
                    <form id="editForm" method="post">
                        <div class="view-det-adm">
                            <span class="view-adm-title">CPF: </span>
                            <span class="view-adm-info"><?php echo htmlspecialchars($user_data['cpf']); ?></span>
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Nome: </span>
                            <span class="view-adm-info"><?php echo htmlspecialchars($user_data['nome']), " ", htmlspecialchars($user_data['sobrenome']); ?></span>
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Email:</span>
                            <input class="preencher" id="email" type="email" name="email" value="<?php echo htmlspecialchars($user_data['email']); ?>"
                            title="Email entre 10 e 50 letras, deve conter @." oninput="emailValidate()" />
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Data de Nascimento: </span>
                            <span class="view-adm-info"><?php echo htmlspecialchars($user_data['dtaNascimento']); ?></span>
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Telefone: </span>
                            <input class="preencher" type="text" id="tel" name="telefone" value="<?php echo htmlspecialchars($user_data['telefone']); ?>" pattern="\d{2}\s?\d{4,5}-?\d{4}"
                            title="Formato: (XX) XXXX-XXXX ou (XX) XXXXX-XXXX." />
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Cidade: </span>
                            <input class="preencher" type="text" id="cep" name="cep" value="<?php echo htmlspecialchars($user_data['cidade']); ?>" title="Sua cidade" />
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Endereço: </span>
                            <input class="preencher" type="text" id="endereco" name="endereco" value="<?php echo htmlspecialchars($user_data['endereco']); ?>" title="Sua cidade" />
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Quantidade de crianças: </span>
                            <input class="preencher" type="text" name="qtdeCrianca" value="<?php echo htmlspecialchars($user_data_pai['qtdeCrianca']); ?>" pattern="[0-9]+"
                            title="Insira apenas números." />
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Sobre: </span>
                            <input class="preencher" type="text" name="sobre" value="<?php echo htmlspecialchars($user_data_pai['descricao']); ?>"
                            title="Descreva um pouco sobre você e suas experiências." />
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Senha: </span>
                            <input class="preencher" type="text" name="senha" value="<?php echo htmlspecialchars($user_data['senha']); ?>"
                            title="Sua senha." />
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>

    <div id="myModal" class="modal2">
        <!-- Conteúdo do modal -->
        <div class="modal2-content">
            <span class="close">&times;</span>
            <p class ="view-adm-title">Deseja confirmar alterações?</p>
                <button type="button" onclick="document.getElementById('editForm').submit();" class="botao-editar">Sim, confirmar alterações.</button>
                <button type="button" onclick="closeModal()" class="botao-remover">Não, descartar alterações.</button>
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