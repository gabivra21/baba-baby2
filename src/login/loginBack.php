<?php
        require 'configu.php';

        // Verifica se o formulário foi submetido
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica se o email e a senha foram enviados
            if (isset($_POST['email']) && isset($_POST['senha'])) {
                
                // Obtém o email e a senha enviados pelo formulário
                $email = $_POST['email'];
                $senha = $_POST['senha'];

                try {
            
                    // Consulta SQL para verificar se o email e senha estão presentes na tabela usuario
                    $sql = $pdo->prepare("SELECT idUsuario FROM usuario WHERE email = :email AND senha = :senha");
                    $sql->bindValue(':email', $email);
                    $sql->bindValue(':senha', $senha);
                    $sql->execute();
                    $row = $sql->fetch(PDO::FETCH_ASSOC);
                    $id = $row['idUsuario'];

                    // Verifica se o email e senha estão presentes na tabela usuario
                    if ($id) {

                        // Verifica se o mesmo ID está presente apenas na tabela baba
                        $sql = $pdo->prepare("SELECT COUNT(*) AS total FROM baba WHERE pk_idUsuario = :idUsuario");
                        $sql->bindValue(':idUsuario', $id);
                        $sql->execute();
                        $result = $sql->fetch(PDO::FETCH_ASSOC);

                        // Se o mesmo ID estiver presente em baba, redireciona para página menu-babá
                        if ($result['total'] > 0) {
                            header("Location: pagina_baba.php");
                            exit();
                        } else {
                            // Se o ID não estiver presente em baba, redireciona para página menu-pais
                            header("Location: outra_pagina.php");
                            exit();
                        }
                    } else {
                        // Se o email e senha não estiverem presentes na tabela usuario, aparecerá um alerta
                        header("Location: outra_pagina.php");
                        echo "acho que deu";
                        //exit();
                    }
                } catch(PDOException $e) {
                    echo "Erro de conexão: " . $e->getMessage();
            }
        }

            
        }

// Fecha a conexão com o banco de dados

$pdo = null;
?>
