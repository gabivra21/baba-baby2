<?php

require 'configu.php';

$idBaba = filter_input(INPUT_GET, 'idBaba');

$querySQL = "SELECT dispo.idDisponibilidade, dia.nome as dia_da_semana, turno.nome as turno, dispo.fk_idDia as idDia  
FROM disponibilidade as dispo
LEFT JOIN dia ON dispo.fk_idDia = dia.idDia
LEFT JOIN turno ON dispo.fk_idTurno = turno.idTurno
WHERE dispo.fk_idBaba = $idBaba;";

$queryPreparada = $pdo->prepare($querySQL);
$queryPreparada->execute();
$queryPreparada->setFetchMode(PDO::FETCH_ASSOC);
$disponibilidadeBaba = $queryPreparada->fetchAll();
?>

<h1>Editar Disponibilidades</h1>
<table border="1">
    <thead>
        <tr>
            <th>Dia da Semana</th>
            <th>Turno</th>
            <th>Operações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($disponibilidadeBaba as $dispo): ?>
            <tr>
                <td><?=$dispo['dia_da_semana']; ?></td>
                <td><?=$dispo['turno']; ?></td>
                <td>
                    <a href="editarDisponibilidadeBABA2.php?idDisponibilidade=<?=$dispo['idDisponibilidade'];?>&idBaba=<?=$idBaba;?>">Editar</a>
                    <a href="excluirDisponibilidadeBABA.php?idDisponibilidade=<?=$dispo['idDisponibilidade'];?>&idBaba=<?=$idBaba;?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a  href="editarDisponibilidadeBABA.php?idBaba=<?php echo $idBaba; ?>">[Editar disponibilidade]</a>
<a  href="addDisponibilidadeBABA.php?idBaba=<?php echo $idBaba; ?>">[Adicionar Disponibilidade]</a>
<a type="button" href="selectBABA.php">[Voltar]</a>