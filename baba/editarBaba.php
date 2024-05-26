<?php
include_once '../conn.php';
session_start();

if ((!isset($_SESSION['idUsuario'])) && (!isset($_SESSION['nome']))) {
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
            echo "Erro ao buscar dados do usuário.";
            exit();
        }
    } else {
        echo "Babá não encontrada para o usuário logado.";
        exit();
    }
} catch (PDOException $e) {
    die("Erro ao processar dados: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $ende = $_POST['endereco'];
    $ref = $_POST['ref'];
    $sobre = $_POST['sobre'];
    $valor = (float)$_POST['valor']; // Convertendo o valor para float
    try {
        $sql_update_user = $pdo->prepare("UPDATE usuario SET email = :email, telefone = :telefone, cidade = :cep, endereco = :endereco WHERE idUsuario = :idUsuario");
        $sql_update_user->bindValue(':email', $email, PDO::PARAM_STR);
        $sql_update_user->bindValue(':telefone', $telefone, PDO::PARAM_STR);
        $sql_update_user->bindValue(':cep', $cep, PDO::PARAM_STR);
        $sql_update_user->bindValue(':endereco', $ende, PDO::PARAM_STR);
        $sql_update_user->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $sql_update_user->execute();

        $sql_update_baba = $pdo->prepare("UPDATE baba SET ref = :ref, sobre = :sobre, valor = :valor WHERE idBaba = :idBaba");
        $sql_update_baba->bindValue(':ref', $ref, PDO::PARAM_STR);
        $sql_update_baba->bindValue(':sobre', $sobre, PDO::PARAM_STR);
        $sql_update_baba->bindValue(':valor', $valor, PDO::PARAM_STR);
        $sql_update_baba->bindValue(':idBaba', $idBaba, PDO::PARAM_INT);
        $sql_update_baba->execute();

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
                window.location.href = 'dadosBaba.php';
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
            <a href="../menuBaba.php" class="sidebar-nav"><i class="icon fa-solid fa-house" style="color: #000000;"></i><span>Início</span></a>
            <a href="dadosBaba.php" class="sidebar-nav active"><i class="icon fa-solid fa-user" style="color: #000000;"></i><span>Dados</span></a>
            <a href="servicosBaba.php" class="sidebar-nav"><i class="icon fa-solid fa-clock-rotate-left" style="color: #000000;"></i><span>Serviços</span></a>
            <a href="../index.php" class="sidebar-nav"><i class="icon fa-solid fa-right-from-bracket" style="color: #e90c0c;"></i><span>Sair</span></a>
        </div>
        <!-- Fim Sidebar -->

        <!-- Início do conteúdo do administrativo -->
        <div class="wrapper">
            <div class="row">
                <div class="top-list">
                    <span class="title-content">Editar Dados</span>
                    <div class="top-list-right">
                        <button type="button" class="botao-editar" id="openModalBtn">Confirmar</button>
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
                            <input class="preencher" id="email" type="email" name="email" value="<?php echo htmlspecialchars($user_data['email']); ?>" title="Email entre 10 e 50 letras, deve conter @." oninput="emailValidate()" />
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Data de Nascimento: </span>
                            <span class="view-adm-info"><?php echo htmlspecialchars($user_data['dtaNascimento']); ?></span>
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Telefone: </span>
                            <input class="preencher" type="text" id="tel" name="telefone" value="<?php echo htmlspecialchars($user_data['telefone']); ?>" pattern="\d{2}\s?\d{4,5}-?\d{4}" title="Formato: (XX) XXXX-XXXX ou (XX) XXXXX-XXXX." />
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Telefone para contato: </span>
                            <input class="preencher" type="text" id="ref" name="ref" value="<?php echo htmlspecialchars($user_data_baba['ref']); ?>" pattern="\d{2}\s?\d{4,5}-?\d{4}" title="Formato: (XX) XXXX-XXXX ou (XX) XXXXX-XXXX." />
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
                            <span class="view-adm-title">Babá desde: </span>
                            <span class="view-adm-info"><?php echo htmlspecialchars($user_data_baba['tempoExp']); ?></span>
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Sobre: </span>
                            <input class="preencher" type="text" name="sobre" value="<?php echo htmlspecialchars($user_data_baba['sobre']); ?>" title="Descreva um pouco sobre você e suas experiências." />
                        </div>

                        <div class="view-det-adm">
                            <span class="view-adm-title">Valor Hora: </span>
                            <input class="preencher" type="text" id="valor" name="valor" value="<?php echo htmlspecialchars($user_data_baba['valor']); ?>" title="Sua cidade" />
                        </div>
                    </form>
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
            <p class="view-adm-title">Deseja confirmar alterações?</p>
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