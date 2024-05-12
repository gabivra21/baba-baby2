<?php

include '../database/configu.php';

//OBTEM DIAS DA SEMANA
$querySQL = "SELECT * FROM dia";
$queryPreparada = $pdo->prepare($querySQL);
$queryPreparada->execute();
$queryPreparada->setFetchMode(PDO::FETCH_ASSOC);
$dias = $queryPreparada->fetchAll();
?>

<div>
    <label for="diasSemana">Tenho disponibilidade nos dias: </label>
    <?php foreach ($dias as $dia): ?>
        <div id='<?= $dia['idDia']; ?>'>
            <label for=""><?= $dia['nome']; ?></label>
            <input type="checkbox" name="dia[]" value="<?= $dia['idDia']; ?>" /><br>
        </div>
    <?php endforeach; ?>
</div>