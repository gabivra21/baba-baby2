<?php
require 'configu.php';

/*select CRIANÇA*/
$lista = [];
$sql = $pdo->query("SELECT * FROM crianca");
if($sql->rowCount() > 0){;
    $lista= $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<h1>Listagem de Filhos</h1>

<table border="1">
    <tr>
        <br>
        <th>ID</th>
        <th>Nome</th>
        <th>Sexo</th>
        <th>Idade</th>
        <th>Ações</th>

    </tr>
    <?php foreach($lista as $crianca): ?>

        <tr>
            <td><?=$crianca['idCrianca'];?></td>
            <td><?=$crianca['nome'];?></td>
            <td><?=$crianca['sexo'];?></td>
            <td><?=$crianca['idade'];?></td>

            <td>
                <a href="excluirCRIA.php?idCrianca=<?=$crianca['idCrianca'];?>">[ Excluir ]</a>
            </td>
            
            
        </tr>
    <?php endforeach; ?>
</table>

<a href="cadastrarCRIA.php">Cadastrar Criança</a><br>
<a href="selectPAIS.php"><button>Voltar</button></a>
