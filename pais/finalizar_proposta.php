<?php
require 'C:\xampp\htdocs\baba-baby2\conn.php'; // Arquivo de configuração do banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['idProposta'])) {
        $idProposta = intval($_POST['idProposta']);
        $dataAtual = date('Y-m-d H:i:s'); // Define a data atual

        try {
            // Atualiza o campo dataPronto com a data atual
            $sql = "UPDATE proposta SET dataPronto = :dataPronto WHERE idProposta = :idProposta";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':dataPronto', $dataAtual, PDO::PARAM_STR);
            $stmt->bindParam(':idProposta', $idProposta, PDO::PARAM_INT);

            if ($stmt->execute()) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Não foi possível atualizar a proposta.']);
            }
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Erro no banco de dados: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'ID da proposta não fornecido.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método de requisição inválido.']);
}
?>