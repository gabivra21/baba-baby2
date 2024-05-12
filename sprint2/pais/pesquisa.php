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
    <div class="navbar">
</header>
    <h2>Resultado da pesquisa</h2>
    <?php
    if (count($resultados)) {
        foreach($resultados as $Resultado) {
    ?>
        <label><?php echo $Resultado['idBaba']; ?> - <?php echo $Resultado['nomeBaba'], $Resultado['cidade']; ?></label>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Atua em</th>
                    <th>Baba desde</th>
                    <th>Tel Referência</th>
                    <th>Sobre</th>
                    <th>Faixa Etaria</th>
                    <th>Valor/Hora</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $Resultado['idBaba']; ?></td>
                    <td><?php echo $Resultado['nomeBaba']; ?></td>
                    <td><?php echo $Resultado['cidade']; ?></td>
                    <td><?php echo $Resultado['tempoExp']; ?></td>
                    <td><?php echo $Resultado['ref']; ?></td>
                    <td><?php echo $Resultado['sobre']; ?></td>
                    <td><?php echo $Resultado['fxEtaria']; ?></td>
                    <td><?php echo $Resultado['valor']; ?></td>
                </tr>
            </tbody>
        </table>
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