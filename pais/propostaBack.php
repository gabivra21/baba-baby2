<?php
require 'C:\xampp\htdocs\baba-baby2\conn.php';
session_start();

$data = filter_input(INPUT_POST, 'dateInput');
$turno = filter_input(INPUT_POST, 'turno');
$idBaba = filter_input(INPUT_POST, 'idBaba');
$pk_idUsuarioB = filter_input(INPUT_POST, 'pk_idUsuario');

try {
    // Passo 1: Inserir a nova proposta na tabela 'Proposta'
    $sql_proposta = $pdo->prepare("INSERT INTO Proposta (fk_idBaba, fk_Bpk_idUsuario, data, turno) VALUES (:fk_idBaba, :fk_Bpk_idUsuario, :data, :turno)");
    $sql_proposta->bindParam(':fk_idBaba', $idBaba, PDO::PARAM_INT);
    $sql_proposta->bindParam(':fk_Bpk_idUsuario', $pk_idUsuarioB, PDO::PARAM_INT);
    $sql_proposta->bindParam(':data', $data, PDO::PARAM_STR);
    $sql_proposta->bindParam(':turno', $turno, PDO::PARAM_STR);

    if ($sql_proposta->execute()) {
        // Obtém o ID da proposta recém-inserida
        $idProposta = $pdo->lastInsertId();

        // Passo 2: Obter o idPais correspondente ao pk_idUsuarioB
        $sql_id = $pdo->prepare("SELECT idPais, pk_idUsuario FROM pais WHERE pk_idUsuario = :idUsuario");
        $sql_id->bindValue(':idUsuario', $pk_idUsuarioB, PDO::PARAM_INT);
        $sql_id->execute();
        $result = $sql_id->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $idPais = $result['idPais'];
            $pk_idUsuarioP = $result['pk_idUsuario'];

            // Passo 3: Atualizar a proposta recém-inserida com fk_idPais e fk_Ppk_idUsuario
            $sql_atualizar_proposta = $pdo->prepare("UPDATE Proposta SET fk_idPais = :fk_idPais, fk_Ppk_idUsuario = :fk_Ppk_idUsuario WHERE idProposta = :idProposta");
            $sql_atualizar_proposta->bindParam(':fk_idPais', $idPais, PDO::PARAM_INT);
            $sql_atualizar_proposta->bindParam(':fk_Ppk_idUsuario', $pk_idUsuarioP, PDO::PARAM_INT);
            $sql_atualizar_proposta->bindParam(':idProposta', $idProposta, PDO::PARAM_INT);
            $sql_atualizar_proposta->execute();

            echo "Proposta criada e atualizada com sucesso!";
        } else {
            echo "Erro ao encontrar o idPais correspondente.";
        }
    } else {
        echo "Erro ao inserir a proposta.";
    }
} catch (PDOException $e) {
    die("Erro ao processar dados: " . $e->getMessage());
}
?>