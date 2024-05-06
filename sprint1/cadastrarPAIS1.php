<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Pais</title>
    <link rel="stylesheet" href="css\cadastrarPAIS1.css">
</head>
<body>
    

<div class="cabecalho">
<h1 id="titulo">Cadastrar Pai/Responsável</h1>
<br>
</div>

<br>
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

<div class="formulario">

<form method="POST" action="cadastrar_actP1.php">
<ul>
    <div class="caixa">
    <label id="cpf">
        <strong>CPF:</strong> <input type="text" name="cpf" pattern="\d{3}\.?\d{3}\.?\d{3}-?\d{2}" title="Formato: XXX.XXX.XXX-XX" required/>
    </label>
    <br>
    <label>
        <strong>Nome:</strong> <input type="text" name="nome" pattern="[a-zA-Z\u00C0-\u00FF ]{2,45}" title="Nome entre 2 e 45 letras." required/>
    </label>
    <br>
    <label>
        <strong>Sobrenome:</strong> <input type="text" name="sobrenome" pattern="[a-zA-Z\u00C0-\u00FF ]{2,45}" title="Sobrenome entre 2 e 45 letras." required/>
    </label>
    <br>
    <label id="dt">
        <strong>Data de Nascimento:</strong><input type="date" id="data "name="dtaNascimento" oninput="validarData()" required/>
    </label>
    <br>
    <label>
        <strong>Telefone:</strong> <input type="text" name="telefone" pattern="\d{2}\s?\d{4,5}-?\d{4}" title="Formato: (XX) XXXX-XXXX ou (XX) XXXXX-XXXX." required/>
    </label>
    <br>
    <label>
    <strong>CEP</strong>: <input type="text" name="cep" pattern="\d{5}-?\d{3}" title="Formato: XXXXX-XXX" required/>
    </label>
    <br>
    <label>
    <strong>Email:</strong> <input type="email" name="email" title="Email entre 10 e 50 letras, deve conter @." required/>
    </label>
    <br>
    <label>
    <strong>Senha: </strong><input type="password" name="senha" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,16}$" required title="A senha deve conter pelo menos uma letra maiúscula, uma letra minúscula, um número, um caractere especial e ter entre 8 e 16 caracteres"/>
    </label>
    <br>
</ul>
    <input type="submit" id="button" value="Próximo">
</div>
   
</form>
</div>
</body>
</html>
