<?php
session_start(); // Inicia a sessão

require 'C:\xampp\htdocs\baba-baby2\conn.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o email e a senha foram enviados
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        // Obtém o email e a senha enviados pelo formulário
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        try {
            // Consulta SQL para verificar se o email e senha estão presentes na tabela usuario
            $sql = $pdo->prepare("SELECT idUsuario, nome, adm FROM usuario WHERE email = :email AND senha = :senha");
            $sql->bindValue(':email', $email);
            $sql->bindValue(':senha', $senha);
            $sql->execute();
            $row = $sql->fetch(PDO::FETCH_ASSOC);

            // Verifica se a consulta retornou algum resultado
            if ($row !== false) {
                $id = $row['idUsuario'];
                $isAdmin = $row['adm']; // Verifica se o usuário é um administrador
                
                // Define a variável de sessão com o ID do usuário e o nome
                $_SESSION['idUsuario'] = $row['idUsuario'];
                $_SESSION['nome'] = $row['nome'];

                // Se o usuário for um administrador, redireciona para uma página específica
                if ($isAdmin == 1) {
                    header("Location: menuAdmin.php");
                    exit();
                }

                // Verifica se o mesmo ID está presente apenas na tabela baba
                $sql = $pdo->prepare("SELECT COUNT(*) AS total FROM baba WHERE pk_idUsuario = :idUsuario");
                $sql->bindValue(':idUsuario', $id);
                $sql->execute();
                $result = $sql->fetch(PDO::FETCH_ASSOC);
                
                // Se o mesmo ID estiver presente em baba, redireciona para página menu-babá
                if ($result['total'] > 0) {
                    // Define a variável de sessão com o ID do usuário
                    header("Location: menuBaba.php");
                    exit();

                } else {
                    // Se o ID não estiver presente em baba, redireciona para página menu-pais
                    header("Location: menuPais.php");
                    exit();
                }
            } else {
                // Se o email e senha não estiverem presentes na tabela usuario, define a mensagem de erro
                $_SESSION['msgErro'] = "Email ou senha inválidos.";
                header("Location: index.php");
                exit();
                
            }

            if(isset($_SESSION['msg_erro'])){
                echo $_SESSION['msg_erro'];
                unset($_SESSION['msg_erro']);
            }

        } catch(PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        }
    }
}

// Fecha a conexão com o banco de dados
$pdo = null;
?>
