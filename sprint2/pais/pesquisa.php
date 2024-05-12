<?php
require 'configu.php';

$nome = isset($_GET['nomeBaba']) ? "%".trim($_GET['nomeBaba'])."%" : "";

$sth = $pdo->prepare("SELECT 
    DISTINCT b.idBaba, u.nome as nomeBaba, 
    b.tempoExp, b.ref, b.sobre, f.nome as fxEtaria, 
    b.valor
    FROM baba as b
    LEFT JOIN usuario as u ON b.pk_idUsuario = u.idUsuario 
    LEFT JOIN fxetaria as f ON b.fk_idFxEtaria = f.idFxEtaria
    WHERE u.nome LIKE :nomeBaba"); // Adicionando a condição WHERE para filtrar pelo nomeBaba
$sth->bindParam(':nomeBaba', $nome, PDO::PARAM_STR);
$sth->execute();

$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resultado da busca</title>
</head>
<body>
    <h2>Resultado da busca</h2>
    <?php
    if (count($resultados)) {
        foreach($resultados as $Resultado) {
    ?>
        <label><?php echo $Resultado['idBaba']; ?> - <?php echo $Resultado['nomeBaba']; ?></label>
        <br>
    <?php
        } 
    } else {
    ?>
        <label>Não foram encontrados resultados pelo termo buscado.</label>
    <?php
    }
    ?>
</body>
</html>
