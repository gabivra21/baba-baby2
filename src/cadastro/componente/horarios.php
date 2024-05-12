<?php

include '../database/configu.php';

$querySQL = "SELECT * FROM turno";
$queryPreparada = $pdo->prepare($querySQL);
$queryPreparada->execute();
$queryPreparada->setFetchMode(PDO::FETCH_ASSOC);
$turnos = $queryPreparada->fetchAll();
?>

<div>
    <label for="horario">Disponibilidade de Horário:</label>
    <?php foreach ($turnos as $turno): ?>
        <div id='<?= $turno['idDia']; ?>'>
            <label for=""><?= $turno['nome']; ?></label>
            <input type="checkbox" name="turno[]" value="<?= $turno['idTurno']; ?>" />
        </div>
    <?php endforeach; ?>
</div>