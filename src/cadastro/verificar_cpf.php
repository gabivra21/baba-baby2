<?php
header('Content-Type: application/json');

require "C:\\xampp\\htdocs\\baba-baby2\conn.php";

// Obtenha o CPF da solicitação POST
$data = json_decode(file_get_contents('php://input'), true);
$cpf = $data['cpf'];

// Prepare a declaração SQL para evitar SQL injection
$stmt = $conn->prepare("SELECT cpf FROM usuario WHERE cpf = ?");
$stmt->bind_param("s", $cpf);

$stmt->execute();
$stmt->store_result();

$response = array();
if ($stmt->num_rows > 0) {
    // CPF encontrado no banco de dados
    $response['exists'] = true;
} else {
    // CPF não encontrado no banco de dados
    $response['exists'] = false;
}

$stmt->close();
$conn->close();

echo json_encode($response);
?>
