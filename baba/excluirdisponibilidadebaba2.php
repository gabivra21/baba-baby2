<?php

include_once 'C:\xampp\htdocs\baba-baby2\conn.php';
session_start();

if ((!isset($_SESSION['idUsuario'])) && (!isset($_SESSION['nome']))) {
    $_SESSION['msgErro'] = "Necessário realizar o login para acessar a página!";
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['idDisponibilidade'])) {
    // Obtém os dados da URL
    $idDisponibilidade = $_GET['idDisponibilidade'];

    // Exclui a disponibilidade da babá do banco de dados
    try {
        $sql = $pdo->prepare("DELETE FROM disponibilidade WHERE idDisponibilidade = :idDisponibilidade");
        $sql->bindValue(':idDisponibilidade', $idDisponibilidade, PDO::PARAM_INT);
        $sql->execute();

        $_SESSION['msgSucesso'] = "Disponibilidade excluída com sucesso.";
    } catch (PDOException $e) {
        $_SESSION['msgErro'] = "Erro ao excluir disponibilidade: " . $e->getMessage();
    }
} else {
    $_SESSION['msgErro'] = "Método de requisição inválido ou parâmetros ausentes.";
}
// Redireciona de volta para a página de disponibilidade
header("Location: excluirDisponibilidadeBaba.php");
exit();
