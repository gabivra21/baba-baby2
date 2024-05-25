<?php

include_once 'C:\xampp\htdocs\baba-baby2\conn.php';
session_start();

if ((!isset($_SESSION['idUsuario'])) && (!isset($_SESSION['nome']))) {
    $_SESSION['msgErro'] = "Necessário realizar o login para acessar a página!";
    header("Location: index.php");
    exit();
}

$idUsuario = $_SESSION['idUsuario'];

try {
    $sql_idBaba = $pdo->prepare("SELECT idBaba FROM baba WHERE pk_idUsuario = :idUsuario");
    $sql_idBaba->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
    $sql_idBaba->execute();
    $result = $sql_idBaba->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $idBaba = $result['idBaba'];

        $diasSelecionados = filter_input(INPUT_POST, 'dia', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        $turnosSelecionados = filter_input(INPUT_POST, 'turno', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

        if (!empty($diasSelecionados) && !empty($turnosSelecionados)) {
            foreach ($diasSelecionados as $dia) {
                foreach ($turnosSelecionados as $turno) {
                    if (!verificaDisponibilidade($idBaba, $dia, $turno, $pdo)) {
                        $pdo->beginTransaction();
                        try {
                            $sql = $pdo->prepare("INSERT INTO disponibilidade (fk_idBaba, fk_idDia, fk_idTurno) VALUES (:idBaba, :dia, :turno)");
                            $sql->bindValue(':idBaba', $idBaba, PDO::PARAM_INT);
                            $sql->bindValue(':dia', $dia, PDO::PARAM_INT);
                            $sql->bindValue(':turno', $turno, PDO::PARAM_INT);
                            $sql->execute();
                            $pdo->commit();
                        } catch (PDOException $e) {
                            $pdo->rollBack();
                            die("Erro: " . $e->getMessage());
                        }
                    }
                }
            }
        }
    } else {
        $_SESSION['msgErro'] = "Erro ao encontrar o idBaba correspondente.";
        header("Location: index.php");
        exit();
    }
} catch (PDOException $e) {
    die("Erro ao processar dados: " . $e->getMessage());
}

function verificaDisponibilidade($idBaba, $dia, $turno, $pdo) {
    $sql = $pdo->prepare("SELECT * FROM disponibilidade WHERE fk_idBaba = :idBaba AND fk_idDia = :dia AND fk_idTurno = :turno");
    $sql->bindValue(':idBaba', $idBaba, PDO::PARAM_INT);
    $sql->bindValue(':dia', $dia, PDO::PARAM_INT);
    $sql->bindValue(':turno', $turno, PDO::PARAM_INT);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    return count($result) > 0;
}

header("Location: disponibilidade.php");
exit();
?>
