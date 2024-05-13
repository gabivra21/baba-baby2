<?php
require 'configu.php';

$nome = isset($_GET['nomeBaba']) ? "%".trim($_GET['nomeBaba'])."%" : "";
$cidade = isset($_GET['cidade']) ? "%".trim($_GET['cidade'])."%" : "";


$sth = $pdo->prepare("SELECT 
    DISTINCT b.idBaba, u.nome as nomeBaba, u.cidade,
    b.tempoExp, b.ref, b.sobre, f.nome as fxEtaria, 
    b.valor
    FROM baba as b
    LEFT JOIN usuario as u ON b.pk_idUsuario = u.idUsuario 
    LEFT JOIN fxetaria as f ON b.fk_idFxEtaria = f.idFxEtaria
    WHERE u.nome LIKE :nomeBaba AND u.cidade LIKE :cidade"); 
$sth->bindParam(':nomeBaba', $nome, PDO::PARAM_STR);
$sth->bindParam(':cidade', $cidade, PDO::PARAM_STR);
$sth->execute();

$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Baba Baby</title>
    <link rel="stylesheet" type="text/css" href="menuPAIS.css">
</head>
<body>
<header>
<header>
    <div class="navbar">
    <div class="barra">
             <img src="barraicon.png">
        </div> 
    </div>
</header>
    <h3>RESULTADO DA PESQUISA</h3>
    <?php
    if (count($resultados)) {
        foreach($resultados as $Resultado) {
    ?>
        <label><?php echo $Resultado['idBaba']; ?> - <?php echo $Resultado['nomeBaba'], $Resultado['cidade']; ?></label>
        <div class="main">
        <?php foreach($listaBaba as $baba): ?>
            <div class="card">
                <img src="babaicon.png">
                <td><?=$Resultado['nomeBaba']; ?></td>
                <td><?=$Resultado['cidade']; ?></td>
                <td><p>R$</p><?=$Resultado['valor']; ?></td>
        </div>
        <?php endforeach; ?>
        <br>
    <?php
        } 
    } else {
    ?>
        <p1>Não foram encontrados resultados pelo termo buscado.</p1>
    <?php
    }
    ?>
</body>
</html>