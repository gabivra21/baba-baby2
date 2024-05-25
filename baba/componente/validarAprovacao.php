<?php
$idUsuario = $_SESSION['idUsuario'];

$querySQL = "SELECT estado, foto_doc FROM baba WHERE pk_idUsuario = $idUsuario";
$queryPreparada = $pdo->prepare($querySQL);
$queryPreparada->execute();
$queryPreparada->setFetchMode(PDO::FETCH_ASSOC);
$dadosBaba = $queryPreparada->fetch();
?>

<?php if ($dadosBaba['estado'] == 0 && $dadosBaba['foto_doc'] == 'pendente'): ?>
    <?php require 'babaNaoAprovada.php' ?>
<?php elseif ($dadosBaba['estado'] == 0): ?>
    <?php require 'babaPendenteAprovacao.php'?>
<?php else: ?>
    <?php require 'babaAprovada.php' ?>
<?php endif; ?>
