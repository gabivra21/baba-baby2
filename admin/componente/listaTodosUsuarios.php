<?php

require "C:\\xampp\\htdocs\\baba-baby2\conn.php";
//session_start();


$querySQL = "SELECT u.idUsuario, u.nome, u.cpf, u.dtaNascimento, u.email, u.telefone, u.cidade, CASE WHEN b.pk_idUsuario IS NOT NULL AND p.pk_idUsuario IS NOT NULL THEN 'Pai e Baba' WHEN b.pk_idUsuario IS NOT NULL THEN 'Baba' WHEN p.pk_idUsuario IS NOT NULL THEN 'Pai' ELSE 'Nenhum' END AS tipo_usuario FROM usuario u LEFT JOIN baba b ON u.idUsuario = b.pk_idUsuario LEFT JOIN pais p ON u.idUsuario = p.pk_idUsuario;";
$queryPreparada = $pdo->prepare($querySQL);
$queryPreparada->execute();
$queryPreparada->setFetchMode(PDO::FETCH_ASSOC);
$todosUsuarios = $queryPreparada->fetchAll();
?>

<?php foreach ($todosUsuarios as $users): ?>
    <?php
        if ($users["tipo_usuario"] == "Nenhum") {
            continue;
        }
    ?>
    <tr>
        <td class="list-body-content"><?= $users['idUsuario']; ?></td>
        <td class="list-body-content"><?= $users['nome']; ?></td>
        <td class="list-body-content"><?= $users['cpf']; ?></td>
        <td class="list-body-content"><?= $users['dtaNascimento']; ?></td>
        <td class="list-body-content"><?= $users['email']; ?></td>
        <td class="list-body-content"><?= $users['telefone']; ?></td>
        <td class="list-body-content"><?= $users['cidade']; ?></td>
        <td class="list-body-content"><?= $users['tipo_usuario']; ?></td>
    </tr>
<?php endforeach; ?>