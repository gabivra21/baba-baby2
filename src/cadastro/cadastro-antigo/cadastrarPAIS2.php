<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro PAIS2</title>
    <link rel="stylesheet" href="css\cadastrarPAIS2.css">
</head>
<body>
    
<div class="cabecalho">
<h1>Cadastrar Pais</h1>
</div>

<form method="POST" action="cadastrar_actP2.php">
    <ul>
        <div class="caixa">
    <label>
        <input type="hidden" name="Conta" value="PAIS" />
        <input type="hidden" name="fk_idUsuario" value="<?php echo $_GET['idUsuario'];?>" />
    </label>
    <label>
        <li><strong>Endereço: </strong><input type="text" name="endereco" pattern="[a-zA-Z0-9\s,'-]*" required title="Por favor, insira um endereço válido"/>
    </label>
    <label>
        <li><strong>Quantidade de criança:</strong> <input type="text" name="qtdeCrianca" pattern="[0-9]+" title="Insira apenas números." required/>
    </label>
    <label>
        <li><strong>Descrição da família:</strong> <input type="text" name="descricao" title="Detalhe um pouco sobre como é sua família." required/>
    
    </label>
    </ul>
    <input type="submit" id="button" onclick="alert('Cadastro PAIS feito!')" value="Salvar"/>
        </div>
</form>
</body>
</html>