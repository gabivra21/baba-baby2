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
    <link rel="stylesheet" type="text/css" href="css\selebaba.css">
    
</head>
<body>
<header>
    <a href="cadastroPG.php" class="button">
        Cadastrar Usuário
        <div class="hoverEffect">
            <div>
            </div>
        </div>
    </a>
  
    <a href="index.php" class="voltar">Voltar</a>
    <img src="imagem/bbbyy.png" width="120px" class="imagemhead" >
</header>
    
    <h1>Listagem de Babá</h1>

    <table border="1">
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
        <?php foreach($listaBaba as $baba): ?>
            <tr>
                <td><?=$baba['idBaba'];?></td>
                <td><?=$baba['nomeBaba'];?></td>
                <td><?=$baba['cidade'];?></td>
                <td><?=$baba['tempoExp'];?></td>
                <td><?=$baba['ref'];?></td>
                <td><?=$baba['sobre'];?></td>
                <td><?=$baba['fxEtaria'];?></td>
                <td><?=$baba['valor'];?></td>
                            <td class="acoes">
                                <a href="disponibilidadeBABA.php?idBaba=<?=$baba['idBaba'];?>" class="botao disponibilidade"> Disponibilidade </a>
                                <a href="editarBABA.php?idBaba=<?=$baba['idBaba'];?>" class="botao editar"> Editar </a>
                                <a href="excluirBABA.php?idBaba=<?=$baba['idBaba'];?>" class="botao excluir"> Excluir </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php
        if ($delete == 1) {
            alerta("Registro da Babá exluído com sucesso!");
        } else if ($delete === 0) {
            alerta("Falha ao excluir registro.");
        } else {
        }
        ?>

</body>
</html>