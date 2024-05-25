<?php

include_once 'C:\xampp\htdocs\baba-baby2\conn.php';
session_start();

if ((!isset($_SESSION['idUsuario'])) AND (!isset($_SESSION['nome']))) {
    $_SESSION['msgErro'] = "Necessário realizar o login para acessar a página!";
    header("Location: index.php");
    exit();
}

$idUsuario = $_SESSION['idUsuario']; // Obter o idUsuario da sessão

try {
    // Passo 1: Obter o idBaba correspondente ao usuário logado
    $sql_idBaba = $pdo->prepare("SELECT idBaba FROM baba WHERE pk_idUsuario = :idUsuario");
    $sql_idBaba->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
    $sql_idBaba->execute();
    $result = $sql_idBaba->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $idBaba = $result['idBaba'];

        // Passo 2: Obter disponibilidade do baba ordenada pelos dias da semana
        $sql_disponibilidade = $pdo->prepare("
            SELECT disp.idDisponibilidade, d.nome as dia, t.nome as turno
            FROM disponibilidade disp
            JOIN dia d ON disp.fk_idDia = d.idDia
            JOIN turno t ON disp.fk_idTurno = t.idTurno
            WHERE disp.fk_idBaba = :idBaba
            ORDER BY FIELD(d.nome, 'segunda', 'terça', 'quarta', 'quinta', 'sexta', 'sábado', 'domingo')
        ");
        $sql_disponibilidade->bindValue(':idBaba', $idBaba, PDO::PARAM_INT);
        $sql_disponibilidade->execute();
        $disponibilidade = $sql_disponibilidade->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    die("Erro ao processar dados: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Disponibilidade</title>
    <link rel="shortcut icon" type="imagex/png" href="../imgIndex/bbbyynew.ico">
    <link rel="stylesheet" href="menuBaba.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-content">
            <div class="bars">
                <i class="fa-solid fa-bars" style="color: #000000;"></i>
            </div>
            <img src="../imgIndex/Babababypng.png" alt="Logo BabáBaby" class="logo-img">
        </div>
        <div class="navbar-ola">
            <p>Olá, <?php echo $_SESSION['nome']; ?></p>
        </div>
    </nav>

    <div class="content">
        <div class="sidebar">
            <a href="../menuBaba.php" class="sidebar-nav"><i class="icon fa-solid fa-house" style="color: #000000;"></i><span>Início</span></a>
            <a href="dadosBaba.php" class="sidebar-nav"><i class="icon fa-solid fa-user" style="color: #000000;"></i><span>Dados</span></a>
            <a href="servicosBaba.php" class="sidebar-nav"><i class="icon fa-solid fa-clock-rotate-left" style="color: #000000;"></i><span>Serviços</span></a>
            <a href="../login/sair.php" class="sidebar-nav"><i class="icon fa-solid fa-right-from-bracket" style="color: #e90c0c;"></i><span>Sair</span></a>
        </div>

        <div class="wrapper">
            <div class="row">
                <div class="top-list">
                    <span class="title-content">Remover disponibilidade</span>
                    <div class="top-list-right">
                        <a href="disponibilidade.php">
                            <button type="button" class="botao-voltar">Voltar</button>
                        </a>
                    </div>
                </div>
                <table class="table-list">
                    <thead class="list-head">
                        <tr>
                            <th class="list-head-content">Dia da semana</th>
                            <th class="list-head-content">Turno</th>
                            <th class="list-head-content">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="list-body">
                        <?php foreach ($disponibilidade as $dispo): ?>
                            <tr>
                                <td class='list-body-content'><?= htmlspecialchars($dispo['dia'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td class='list-body-content'><?= htmlspecialchars($dispo['turno'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td class='list-body-content acoes'>
                                    <a href="excluirDisponibilidadeBaba2.php?idDisponibilidade=<?= $dispo['idDisponibilidade']; ?>" onclick="return confirm('Deseja realmente excluir esta disponibilidade?');">
                                        <button type="button" class="botao-excluirdispo">Excluir</button>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
