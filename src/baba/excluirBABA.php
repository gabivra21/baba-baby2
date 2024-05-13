<?php
    require 'C:\xampp\htdocs\baba-baby2\conn.php';
    
    $id = filter_input(INPUT_GET, 'idBaba');

    //verificar disponibilidade baba
    $queryVerificacao = "SELECT * FROM disponibilidade WHERE fk_idBaba = $id";
    $queryPreparada = $pdo->prepare($queryVerificacao);
    if ($queryPreparada->execute()) {
        $resultado = $queryPreparada->fetchAll(PDO::FETCH_ASSOC);
        if ($resultado) {
            confirmacao("A conta possui registro de disponibilidade. Deseja seguir com a exclusão da conta?", $id, true);
        } else {
            confirmacao("Deseja seguir com a exclusão da conta?",$id, false);
        }
    }

    function confirmacao(string $mensagem, int $id, bool $disponibilidade) {
        echo "<script>
                    if (confirm('$mensagem')) {
                        window.location.href = 'excluirBABA2.php?idBaba=$id&disponibilidade=$disponibilidade';
                    } else {
                        window.location.href = 'selectBABA.php';
                    }
              </script>";
    }