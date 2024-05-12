<?php
require 'configu.php';

$pais = [];
$idPais = filter_input(INPUT_GET, 'idPais');
if($idPais){
    $sql = $pdo->prepare("SELECT * FROM pais WHERE idPais = :idPais");
    $sql->bindValue(':idPais', $idPais);
    $sql->execute();

    if($sql->rowCount() > 0){
        $pais = $sql->fetch(PDO::FETCH_ASSOC);
    }else{
        header("Location: select.php");
        exit;
    }
}else{
    header("Location: select.php");
}
?>

<h1>Editar Pais</h1>
<form method="POST" action="editarPAIS_act.php">
    <ul>
    <input type="hidden" name= "idPais" value="<?=$idPais;?>"/>
    <label>
        <li>Endereço: <input type="text" name="endereco" pattern="[a-zA-Z0-9\s,'-]*" required title="Por favor, insira um endereço válido" value="<?=$pais['endereco'];?>"/>
    </label>
    <label>
        <li>Qtde Criança: <input type="number" name="qtdeCrianca" value="<?=$pais['qtdeCrianca'];?>"/>
    </label>
    <label>
        <li>Descriação: <input type="text" name="descricao" title="Detalhe um pouco sobre como é sua família." required value="<?=$pais['descricao'];?>"/>
    </label>
    <input type="submit" value="Atualizar"/>
    </ul>
</form>
<a href="selectPAIS.php"><button>Voltar</button></a>