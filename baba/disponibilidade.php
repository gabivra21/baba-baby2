<?php

include_once 'C:\xampp\htdocs\baba-baby2\conn.php';

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
            SELECT disp.fk_idDia, disp.fk_idTurno
            FROM disponibilidade disp
            WHERE disp.fk_idBaba = :idBaba
            ORDER BY FIELD(disp.fk_idDia, 1, 2, 3, 4, 5, 6, 7)
        ");
        $sql_disponibilidade->bindValue(':idBaba', $idBaba, PDO::PARAM_INT);
        $sql_disponibilidade->execute();
        $disponibilidade = $sql_disponibilidade->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    die("Erro ao processar dados: " . $e->getMessage());
}

// Obter os nomes dos dias e turnos
$sql_dias = $pdo->query("SELECT idDia, nome FROM dia ORDER BY FIELD(idDia, 1, 2, 3, 4, 5, 6, 7)");
$dias = $sql_dias->fetchAll(PDO::FETCH_KEY_PAIR);

$sql_turnos = $pdo->query("SELECT idTurno, nome FROM turno");
$turnos = $sql_turnos->fetchAll(PDO::FETCH_KEY_PAIR);

$listaConsolidada = array();
foreach ($disponibilidade as $dispo) {
    if (isset($dias[$dispo['fk_idDia']]) && isset($turnos[$dispo['fk_idTurno']])) {
        $dia = $dias[$dispo['fk_idDia']];
        $turno = $turnos[$dispo['fk_idTurno']];
        
        if (!isset($listaConsolidada[$dia])) {
            $listaConsolidada[$dia] = array();
        }
        array_push($listaConsolidada[$dia], $turno);
    } else {
        echo "IDs de dia ou turno não encontrados no array: ";
        print_r($dispo);
    }
}

foreach ($listaConsolidada as $dia => $turnos) {
    $listaConsolidada[$dia] = implode(" - ", $turnos);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Baba</title>
    <link rel="shortcut icon" type="imagex/png" href="../imgIndex/bbbyynew.ico">
    <link rel="stylesheet" href="menuBaba.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <!-- Início Navbar -->
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
        <!-- Início do conteúdo do administrativo -->
        <div class="wrapper">
            <div class="row">
                <div class="top-list">
                    <span class="title-content">Sua disponibilidade cadastrada de horários</span>
                    <div class="top-list-right">
                        <a href="editDisponibilidadeBaba.php">
                            <button type="button" class="botao-adddisp">Adicionar Disponibilidade</button>
                        </a>
                        <a href="excluirDisponibilidadeBaba.php">
                            <button type="button" class="botao-excdisp">Remover Disponibilidade</button>
                        </a>
                    </div>
                    
                </div>
                <table class="table-list">
                    <thead class="list-head">
                        <tr>
                            <th class="list-head-content">Dia da semana</th>
                            <th class="list-head-content">Turno</th>
                        </tr>
                    </thead>
                    <tbody class="list-body">
                        <?php foreach ($listaConsolidada as $dia => $turnos): ?>
                            <tr>
                                <td class='list-body-content'><?php echo htmlspecialchars($dia, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td class='list-body-content'><?php echo htmlspecialchars($turnos, ENT_QUOTES, 'UTF-8'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Fim do conteúdo do administrativo -->
</body>
</html>