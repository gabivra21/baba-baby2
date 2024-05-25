<?php
include_once '../conn.php';
session_start();

if ((!isset($_SESSION['idUsuario'])) && (!isset($_SESSION['nome']))) {
    $_SESSION['msgErro'] = "Necessário realizar o login para acessar a página!";
    header("Location: index.php");
    exit();
}

$idUsuario = $_SESSION['idUsuario']; // Usuário logado

try {
    // Verificar se há alguma entrada na tabela 'baba' para o usuário logado
    $sql_check = $pdo->prepare("SELECT idPais FROM pais WHERE pk_idUsuario = :idUsuario");
    $sql_check->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
    $sql_check->execute();
    $result = $sql_check->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $idPais = $result['idPais']; // Armazenar o idBaba, se existir

        // Executar o DELETE se o idPais existir
        $sql_delete = $pdo->prepare("DELETE FROM pais WHERE idPais = :idPais AND pk_idUsuario = :idUsuario");
        $sql_delete->bindValue(':idPais', $idPais, PDO::PARAM_INT);
        $sql_delete->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $sql_delete->execute();

        $sql_delete_usuario = $pdo->prepare("DELETE FROM usuario WHERE idUsuario = :idUsuario");
        $sql_delete_usuario->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $sql_delete_usuario->execute();

        if ($sql_delete->rowCount() > 0 && $sql_delete_usuario->rowCount() > 0) {
            header("Location: ../contaDeletada.html");
            exit();
        } else {
            echo "Erro ao deletar pai.";
        }
    } else {
        echo "Pai não encontrado.";
    }
} catch (PDOException $e) {
    die("Erro ao processar dados: " . $e->getMessage());
}
?>
