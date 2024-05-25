<?php
require 'configu.php';

$baba = [];
$idBaba = filter_input(INPUT_GET, 'idBaba');
if($idBaba){
    $sql = $pdo->prepare("SELECT * FROM baba WHERE idBaba = :idBaba");
    $sql->bindValue(':idBaba', $idBaba);
    $sql->execute();

    if($sql->rowCount() > 0){
        $baba = $sql->fetch(PDO::FETCH_ASSOC);
    }else{
        header("Location: selectBABA.php");
        exit;
    }
}else{
    header("Location: selectBABA.php");
}
?>

<h1>Editar Babá</h1>
<form method="POST" action="editarBABA_act.php">
    <ul>
    <input type="hidden" name= "idBaba" value="<?=$baba['idBaba'];?>"/>
    <label>
        <li>Sobre: <input type="text" name="sobre" title="Descreva um pouco sobre você e suas experiências." required value="<?=$baba['sobre'];?>"/>
    </label>
    <label>
        <li>Valor/hora: <input type="text" name="valorH" pattern="\d+(\.\d+)?" required title="Insira um valor em reais (com ponto ao invés de vírgula!)" value="<?=$baba['valorH'];?>"/>
    </label>
    <input type="submit" value="Atualizar"/>
    </ul>
</form>
<a href="selectBABA.php"><button>Voltar</button></a>