<?php
require 'configu.php';

$delete = filter_input(INPUT_GET, 'delete');
/*select BABÁ*/
$querySQL = "SELECT 
DISTINCT b.idBaba, u.nome as nomeBaba, u.cidade, 
b.tempoExp, b.ref, b.sobre, f.nome as fxEtaria, 
b.valor
FROM baba as b
LEFT JOIN usuario as u ON b.pk_idUsuario = u.idUsuario 
LEFT JOIN fxetaria as f ON b.fk_idFxEtaria = f.idFxEtaria;
";
$queryPreparada = $pdo->prepare($querySQL);
$queryPreparada->execute();
$queryPreparada->setFetchMode(PDO::FETCH_ASSOC);
$listaBaba = $queryPreparada->fetchAll();

function alerta(string $mensagem)
{
    echo "<script type='text/javascript' >
                alert('$mensagem');
          </script>";
}
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
<div class="boxsearch">
        <form action="pesquisa.php" method="GET">
            <input type="text" name="search_query" placeholder="Pesquise por nome ou cidade" class="caixa">
            <button class="botao">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/></svg>
            </button>
        </form>
    </div>

    <h1>BABÁS DISPONÍVEIS</h1>

    <div class="main">
        <?php foreach($listaBaba as $baba): ?>
            <div class="card">
                <img src="babaicon.png">
                <td><?=$baba['nomeBaba']; ?></td>
                <td><?=$baba['cidade']; ?></td>
                <td><?=$baba['valor']; ?></td>
        </div>
        <?php endforeach; ?>
        <div class="card">
            <img src="babaicon.png">
            <p>LAURA</p>
            <p>CURITIBA - PR</p>
            <p>R$200</p>
        </div>
        <div class="card">
            <img src="babaicon.png">
        </div>
        <div class="card">
            <img src="babaicon.png">
        </div>
    </div>

</body>
</html>