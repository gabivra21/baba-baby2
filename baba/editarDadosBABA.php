<?php

include_once 'C:\xampp\htdocs\baba-baby2\conn.php';

if ((!isset($_SESSION['idUsuario'])) AND (!isset($_SESSION['nome']))) {
    $_SESSION['msgErro'] = "Necessário realizar o login para acessar a página!";
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $idUsuario = $_SESSION['idUsuario'];
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $tempoExp = filter_input(INPUT_POST, "tempoExp");
        $sobre = filter_input(INPUT_POST, "sobre");
        $telefone = filter_input(INPUT_POST, "telefone");
        $endereco = filter_input(INPUT_POST, "endereco");
        $valorHora = filter_input(INPUT_POST, "valorHora", FILTER_VALIDATE_FLOAT);

        $sql_update = $pdo->prepare("
            UPDATE baba
            SET email = :email,
                tempoExp = :tempoExp,
                sobre = :sobre,
                telefone = :telefone,
                endereco = :endereco,
                valor = :valorHora
            WHERE pk_idUsuario = :idUsuario
        ");

        $sql_update->bindValue(':email', $email);
        $sql_update->bindValue(':tempoExp', $tempoExp);
        $sql_update->bindValue(':sobre', $sobre);
        $sql_update->bindValue(':telefone', $telefone);
        $sql_update->bindValue(':endereco', $endereco);
        $sql_update->bindValue(':valorHora', $valorHora);
        $sql_update->bindValue(':idUsuario', $idUsuario);
        $sql_update->execute();

        $_SESSION['msgSucesso'] = "Dados atualizados com sucesso!";
        header("Location: dadosBaba.php");
        exit();
    } catch (PDOException $e) {
        $_SESSION['msgErro'] = "Erro ao atualizar os dados: " . $e->getMessage();
        header("Location: dadosBaba.php");
        exit();
    }
} else {
    $_SESSION['msgErro'] = "Método de requisição inválido!";
    header("Location: dadosBaba.php");
    exit();
}
