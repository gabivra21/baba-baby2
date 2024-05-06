<?php
require 'configu.php';

/*select PAIS*/
$lista = [];
$sql = $pdo->query("SELECT idPais, endereco, qtdeCrianca, descricao, nome from pais left join usuario on usuario.idUsuario = pais.fk_idUsuario");
if($sql->rowCount() > 0){;
    $lista= $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css\selepais.css">
    
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

    <h1>Listagem de Pais</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Endereço</th>
        <th>QtdeCriança</th>
        <th>Descrição</th>
        <th>Ações</th>

    </tr>
    <?php foreach($lista as $pais): ?>
        <tr>
            <td><?=$pais['idPais'];?></td>
            <td><?=$pais['nome'];?></td>
            <td><?=$pais['endereco'];?></td>
            <td><?=$pais['qtdeCrianca'];?></td>
            <td><?=$pais['descricao'];?></td>
            <td>
                <a href="editarPAIS.php?idPais=<?=$pais['idPais'];?>" class="botao editar"> Editar </a>
                <a onclick="confirmarExclusao()" href="excluirPAIS.php?idPais=<?=$pais['idPais'];?>" class="botao excluir"> Excluir </a>
                
            </td>
            
            
            
        </tr>
    <?php endforeach; ?>
</table>
<script>
    function confirmarExclusao() {
        
        if (confirm('Tem certeza que deseja excluir sua conta? Esta ação não poderá ser desfeita.')) {
            <a href="excluirPAIS.php?idPais=<?=$pais['idPais'];?>"></a>
            alert('Sua conta foi excluída com sucesso.');
        }
    }
</script>