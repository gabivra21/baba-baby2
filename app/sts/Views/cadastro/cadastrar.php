
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
<?php
//View da página de cadastro pais

echo "<h1>Cadastre-se</h1>";

?>   


<script>
    function validarData() {
        var dataInput = document.getElementById('data').value;
        var dataAtual = new Date().toISOString().slice(0, 10);
            
        if (dataInput >= dataAtual) {
            alert('Por favor, selecione seu ano real de nascimento.');
            document.getElementById('data').value = '';
        }
    }


</script>

<form method="POST" action="">
    <p>Bem-vindo à BabáBaby </p>
    <label><strong>Nome:</strong></label>
    <input name="name" type="text" placeholder="Nome"> <br><br>

    <label><strong>Sobrenome:</strong></label>
    <input name="sobrenome" type="text" placeholder="Sobrenome"> <br><br>

    <label id="dt">
        <strong>Data de Nascimento:</strong><input type="date" id="data "name="dtaNascimento" oninput="validarData()" required/> <br><br>
    </label>

    <label id="cpf">
        <strong>CPF:</strong> <input type="text" name="cpf" pattern="\d{3}\.?\d{3}\.?\d{3}-?\d{2}" title="Formato: XXX.XXX.XXX-XX" required/> <br><br>
    </label>

    <label>
        <strong>Telefone:</strong> <input type="text" name="telefone" pattern="\d{2}\s?\d{4,5}-?\d{4}" title="Formato: (XX) XXXX-XXXX ou (XX) XXXXX-XXXX." required/> <br><br>
    </label>

    <label id="Sous">
        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
    <label for="vehicle1"> Sou pai</label><br>
        <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
    <label for="vehicle2"> Sou babá</label><br>

    </label>


</form>

</body>
</html>

