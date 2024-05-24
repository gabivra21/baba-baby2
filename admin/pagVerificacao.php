<?php

include 'C:\\xampp\\htdocs\\baba-baby2\\conn.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    $stmt = $pdo->prepare('SELECT * FROM baba WHERE id = ?');
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
    $stmt = $pdo->prepare('UPDATE baba SET estado = 1 WHERE id = ?');
    $stmt->execute([$id]);
    header('Location: verify.php?id=' . $id);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação de Baba</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Verificação de Baba</h1>
    <div class="babysitter-info">
        <img src="<?= htmlspecialchars($babysitter['photo_url']) ?>" alt="Foto da Baba">
        <h2><?= htmlspecialchars($babysitter['name']) ?></h2>
        <p>Email: <?= htmlspecialchars($babysitter['email']) ?></p>
        <?php if ($babysitter['verified']): ?>
            <p>Esta baba já foi verificada.</p>
        <?php else: ?>
            <form action="verify.php?id=<?= $id ?>" method="post">
                <button type="submit">Aprovar</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
