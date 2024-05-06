<?php

$id = $_GET['idBaba'];
// $erro = filter_input(INPUT_GET, 'erro');

require 'configu.php';
//OBTEM DIAS DA SEMANA
$querySQL = "SELECT * FROM dia";
$queryPreparada = $pdo->prepare($querySQL);
$queryPreparada->execute();
$queryPreparada->setFetchMode(PDO::FETCH_ASSOC);
$dias = $queryPreparada->fetchAll();

//OBTEM HORARIOS
$querySQL = "SELECT * FROM turno";
$queryPreparada = $pdo->prepare($querySQL);
$queryPreparada->execute();
$queryPreparada->setFetchMode(PDO::FETCH_ASSOC);
$turnos = $queryPreparada->fetchAll();

// function alerta(string $mensagem) {
//     echo "<script type='text/javascript' >
//                 alert('$mensagem');
//           </script>";
// }
?>
<h1>Cadastrar Disponibilidade</h1>
<form method="POST" action="addDisponibilidadeBABA2.php?idBaba=<?php echo $id; ?>">
    <div>
        <label for="dias_semana">Selecione o dia da semana:</label>
        <?php foreach ($dias as $dia): ?>
            <div id='<?= $dia['idDia']; ?>'>
                <input type="checkbox" name="dia[]" value="<?= $dia['idDia']; ?>" />
                <label for=""><?= $dia['nome']; ?></label>
            </div>
        <?php endforeach; ?>
    </div>
    <div>
        <label for="turno">Selecione o turno:</label>
        <select name="turno" id="turno">
            <?php foreach ($turnos as $turno): ?>
                <option value="<?= $turno['idTurno']; ?>"><?= $turno['nome']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <input type="submit" value="Salvar" />
</form>
<a href="disponibilidadeBABA.php?idBaba=<?php echo $id; ?>">[ Volvar ]</a>
<?php
// if ($erro == 1) {
//     alerta("Você está tentando inserir uma disponibilidade que Já está registrada! Verifique e tente novamente.");
// }
?>