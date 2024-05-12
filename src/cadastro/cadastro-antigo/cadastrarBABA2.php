<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro BABÁ2</title>
    <link rel="stylesheet" href="css\cadastrarBABA2.css">

</head>
<body>
    


<?php
require 'configu.php';
?>

<div class="cabecalho">
<h1>Cadastrar Babá</h1>
</div>

<form method="POST" action="cadastrar_actB2.php">
    <ul>
        <div class="caixa">
        <label>
            <input type="hidden" name="Conta" value="BABÁ" />
            <input type="hidden" name="fk_idUsuario" value="<?php echo $_GET['idUsuario']; ?>" />
            <input type="hidden" name="statuz" value="Em Verificação" />
        </label>
        <label>
            <li><strong>Tempo de Experiência (Desde -ano):</strong> <input type="text" name="tempoExp" pattern="[0-9]{4}" required
                    title="Por favor, insira um ano válido (quatro dígitos)" /><br>
        
        </label>
        <label>
            <li><strong>Referência (contato): </strong><input type="text" name="ref"
                    pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}|^\d{10,}$" required
                    title="Por favor, insira um email ou um número de telefone válido para contato (min. 10 dígitos)." /><br>
        </label>
        <label>
            <li><strong>Sobre: </strong><input type="text" name="sobre" title="Descreva um pouco sobre você e suas experiências."
                    required /><br>
        </label>
        <label>
            <p>
                <li><strong>Tenho prefência em cuidar de (opção única):</strong>
                    <select name="fk_idFxEtaria" required>
                        <option value="1">Bebê</option>
                        <option value="2">Criança</option>
                        <option value="3">Infantojuvenil</option>
                        <option value="4">Adolescente</option>
                    </select>
            </p><br>
        </label>
        <label>
            <li><strong>Valor/hora:</strong> <input type="text" name="valorH" pattern="\d+(\.\d+)?" required
                    title="Insira um valor em reais (com ponto ao invés de vírgula!)" /><br>
        </label><br>
        <?php
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
        ?>
        <label>
            <li><strong>Disponibilidade de Dias</strong></li><br>
            <?php foreach($dias as $dia): ?>
                <div id='<?=$dia['idDia'];?>'>
                    <label for=""><?=$dia['nome'];?></label>
                    <input type="checkbox" name="dia[]" value="<?=$dia['idDia'];?>"/><br>
                </div>
            <?php endforeach; ?><br>
        <label>
            <li><strong>Disponibilidade de Horário</strong></li><br>
            <?php foreach($turnos as $turno): ?>
                <div id='<?=$turno['idDia'];?>'>
                    <label for=""><?=$turno['nome'];?></label>
                    <input type="checkbox" name="turno[]" value="<?=$turno['idTurno'];?>" />
                </div>
            <?php endforeach; ?>
            
        </label>
    </ul>
    <input type="submit" id="button" onclick="alert('Cadastro BABÁ feito!')" value="Salvar" />
    </div>
</form>
</body>
</html>