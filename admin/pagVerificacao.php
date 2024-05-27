<?php
include 'C:\\xampp\\htdocs\\baba-baby2\\conn.php';

$id = isset($_GET['idBaba']) ? (int)$_GET['idBaba'] : 0;

if ($id > 0) {
    $stmt = $pdo->prepare('SELECT * FROM baba WHERE idBaba = ?');
    $stmt->execute([$id]);
    $babysitter = $stmt->fetch();

    if (!$babysitter) {
        echo 'Baba não encontrada';
        exit;
    }
} else {
    echo 'ID inválido';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare('UPDATE baba SET estado = 1 WHERE idBaba = ?');
    $stmt->execute([$id]);
    header('Location: pagVerificacao.php?idBaba=' . $id);
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação de Baba</title>
    <link rel="stylesheet" href="pagVerificacao.css">
</head>
<body>
    <h1>Verificação de Baba</h1>
    <div class="babysitter-info">
        <!-- Exibe a foto da babá -->
        <img src="<?= htmlspecialchars($babysitter['foto_doc']) ?>" alt="Foto da Baba">">
        <!-- Exibe a descrição da babá -->
        <p>Descrição: <?= htmlspecialchars($babysitter['sobre']) ?></p>
        <!-- Exibe o tempo de experiência da babá -->
        <p>Trabalha como babá desde: <?= htmlspecialchars($babysitter['tempoExp']) ?></p>
        <!-- Verifica se a babá já foi verificada -->
        <?php if ($babysitter['estado']): ?>
            <p>Esta babá já foi verificada.</p>
        <?php else: ?>
            <!-- Formulário para submeter a verificação da babá -->
            <form action="pagVerificacao.php?idBaba=<?= $id ?>" method="post">
                <button type="submit">Aprovar</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>