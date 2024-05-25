<?php

require "C:\\xampp\\htdocs\\baba-baby2\\conn.php";
//session_start();

$querySQL = "SELECT b.idBaba , u.nome, u.cpf, u.dtaNascimento, u.email, u.telefone, u.cidade from baba b inner join usuario u on b.pk_idUsuario = u.idUsuario where b.estado = 0;";
$queryPreparada = $pdo->prepare($querySQL);
$queryPreparada->execute();
$queryPreparada->setFetchMode(PDO::FETCH_ASSOC);
$babasNaoVerificadas = $queryPreparada->fetchAll();
?>

<?php foreach ($babasNaoVerificadas as $baba): ?>
    <tr>
        <td class="list-body-content"><?= $baba['idBaba']; ?></td>
        <td class="list-body-content"><?= $baba['nome']; ?></td>
        <td class="list-body-content"><?= $baba['cpf']; ?></td>
        <td class="list-body-content"><?= $baba['dtaNascimento']; ?></td>
        <td class="list-body-content"><?= $baba['email']; ?></td>
        <td class="list-body-content"><?= $baba['telefone']; ?></td>
        <td class="list-body-content"><?= $baba['cidade']; ?></td>
        <td class="list-body-content">
            <button type="button" class="botao-verificar" data-id="<?= $baba['idBaba']; ?>">Verificar documentos</button>
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                const botoesVerificar = document.querySelectorAll('.botao-verificar');
                if (botoesVerificar) {
                        botoesVerificar.forEach(botao => {
                            botao.addEventListener('click', () => {
                                const idBaba = botao.getAttribute('data-id');
                                window.location.href = `pagVerificacao.php?idBaba=${idBaba}`;
                });
            });
        }
    });
</script>
        </td>
    </tr>
<?php endforeach; ?>