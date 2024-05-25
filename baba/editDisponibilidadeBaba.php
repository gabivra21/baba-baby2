<?php

include_once 'C:\xampp\htdocs\baba-baby2\conn.php';
session_start();

if ((!isset($_SESSION['idUsuario'])) && (!isset($_SESSION['nome']))) {
    $_SESSION['msgErro'] = "Necessário realizar o login para acessar a página!";
    header("Location: index.php");
    exit();
}

$idUsuario = $_SESSION['idUsuario'];

try {
    $sql_idBaba = $pdo->prepare("SELECT idBaba FROM baba WHERE pk_idUsuario = :idUsuario");
    $sql_idBaba->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
    $sql_idBaba->execute();
    $result = $sql_idBaba->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $idBaba = $result['idBaba'];

        $sql_dias = $pdo->query("SELECT idDia, nome FROM dia");
        $dias = $sql_dias->fetchAll(PDO::FETCH_ASSOC);

        $sql_turnos = $pdo->query("SELECT idTurno, nome FROM turno");
        $turnos = $sql_turnos->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $_SESSION['msgErro'] = "Erro ao encontrar o idBaba correspondente.";
        header("Location: index.php");
        exit();
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
    <title>Adicionar Disponibilidade</title>
    <link rel="shortcut icon" type="image/x-icon" href="../imgIndex/bbbyynew.ico">
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
            <p>Olá, <?php echo htmlspecialchars($_SESSION['nome'], ENT_QUOTES, 'UTF-8'); ?></p>
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
            <div class="cabecalho">
                <h1>Adicionar Disponibilidade</h1>
                <br>
            </div>
            <div class="formulario">
                <form method="POST" action="addDisponibilidadeBaba.php">
                    <div class="caixa">
                        <div class="checkbox dias">
                            <label class="form-control" for="dias_semana">Selecione o dia da semana:</label>
                            <?php foreach ($dias as $dia): ?>
                                <div id='<?= $dia['idDia']; ?>'>
                                    <input type="checkbox" name="dia[]" value="<?= $dia['idDia']; ?>" />
                                    <label class="labelCheck" for=""><?= htmlspecialchars($dia['nome'], ENT_QUOTES, 'UTF-8'); ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="checkbox turnos">
                            <label class="form-control" for="turnos">Selecione o turno:</label>
                            <?php foreach ($turnos as $turno): ?>
                                <div id='<?= $turno['idTurno']; ?>'>
                                    <input type="checkbox" name="turno[]" value="<?= $turno['idTurno']; ?>" />
                                    <label class="labelCheck" for=""><?= htmlspecialchars($turno['nome'], ENT_QUOTES, 'UTF-8'); ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <input type="submit" class="btnSalvar" value="Salvar" />
                </form>
                <br>
                    <a href="disponibilidade.php" class="botao-voltar">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>