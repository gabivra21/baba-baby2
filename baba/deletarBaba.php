<?php
include_once 'C:\xampp\htdocs\baba-baby2\conn.php';

if ((!isset($_SESSION['idUsuario'])) && (!isset($_SESSION['nome']))) {
    $_SESSION['msgErro'] = "Necessário realizar o login para acessar a página!";
    header("Location: index.php");
    exit();
}

$idUsuario = $_SESSION['idUsuario']; // Usuário logado

try {
    // Verificar se há alguma entrada na tabela 'baba' para o usuário logado
    $sql_check = $pdo->prepare("SELECT idBaba FROM baba WHERE pk_idUsuario = :idUsuario");
    $sql_check->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
    $sql_check->execute();
    $result = $sql_check->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $idBaba = $result['idBaba']; // Armazenar o idBaba, se existir

        $sql_check_proposta = $pdo->prepare("SELECT * FROM proposta WHERE fk_idBaba = :idBaba");
        $sql_check_proposta->bindValue(':idBaba', $idBaba, PDO::PARAM_INT);
        $sql_check_proposta->execute();
        $result_proposta = $sql_check_proposta->fetchAll(PDO::FETCH_ASSOC);

        if ($result_proposta) {
            $sql_delete_proposta = $pdo->prepare("DELETE FROM proposta WHERE fk_idBaba = :idBaba");
            $sql_delete_proposta->bindValue(':idBaba', $idBaba, PDO::PARAM_INT);
            $sql_delete_proposta->execute();
        }

        $sql_check_disponibilidade = $pdo->prepare("SELECT * FROM disponibilidade WHERE fk_idBaba = :idBaba");
        $sql_check_disponibilidade->bindValue(':idBaba', $idBaba, PDO::PARAM_INT);
        $sql_check_disponibilidade->execute();
        $result_disponibilidade = $sql_check_disponibilidade->fetchAll(PDO::FETCH_ASSOC);

        if ($result_disponibilidade) {
            // Se houver entradas na tabela disponibilidade referentes a este idBaba, exclua-as primeiro
            $sql_delete_disponibilidade = $pdo->prepare("DELETE FROM disponibilidade WHERE fk_idBaba = :idBaba");
            $sql_delete_disponibilidade->bindValue(':idBaba', $idBaba, PDO::PARAM_INT);
            $sql_delete_disponibilidade->execute();
        }

        // Executar o DELETE se o idBaba existir
        $sql_delete = $pdo->prepare("DELETE FROM baba WHERE idBaba = :idBaba AND pk_idUsuario = :idUsuario");
        $sql_delete->bindValue(':idBaba', $idBaba, PDO::PARAM_INT);
        $sql_delete->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $sql_delete->execute();

        $sql_delete_usuario = $pdo->prepare("DELETE FROM usuario WHERE idUsuario = :idUsuario");
        $sql_delete_usuario->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $sql_delete_usuario->execute();

        if ($sql_delete->rowCount() > 0 && $sql_delete_usuario->rowCount() > 0) {
            header("Location: ../contaDeletada.html");
            exit();
        } else {
            echo "Erro ao deletar baba.";
        }
    } else {
        echo "Baba não encontrado/a.";
    }
} catch (PDOException $e) {
    die("Erro ao processar dados: " . $e->getMessage());
}
?>