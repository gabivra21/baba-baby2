<?php
require 'configu.php';

$delete = filter_input(INPUT_GET, 'delete');
/*select BABÁ*/
$querySQL = "SELECT 
DISTINCT b.idBaba, u.nome as nomeBaba, 
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
    <link rel="stylesheet" type="text/css" href="css\selebaba.css">
    
</head>
<body>
<header>
    <img src="imagem/bbbyy.png" width="120px" class="imagemhead" >
</header>
    
    <h1>Listagem de Babá</h1>

    <form action="pesquisa.php" method="GET">
        <input type="text" name="search_query" placeholder="Pesquise a babá por nome ou cidade">
        <input type="submit" value="Pesquisar">
    </form>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Baba desde</th>
            <th>Tel Referência</th>
            <th>Sobre</th>
            <th>Faixa Etaria</th>
            <th>Valor/Hora</th>
            <th>Ações</th>
        </tr>
        <?php foreach($listaBaba as $baba): ?>
            <tr>
                <td><?=$baba['idBaba'];?></td>
                <td><?=$baba['nomeBaba'];?></td>
                <td><?=$baba['tempoExp'];?></td>
                <td><?=$baba['ref'];?></td>
                <td><?=$baba['sobre'];?></td>
                <td><?=$baba['fxEtaria'];?></td>
                <td><?=$baba['valor'];?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

</body>
</html>