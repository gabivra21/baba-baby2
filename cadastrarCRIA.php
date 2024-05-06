<h1>Cadastrar Criança</h1>
<p>Dados Criança</p>
<form method="POST" action="cadastrar_actC.php">
    <ul>
    <label>
        <li>Nome: <input type="text" name="nome" pattern="[a-zA-Z\u00C0-\u00FF ]{2,45}" title="Nome entre 2 e 45 letras." required/>
    </label>
    <label>
        <li>Sexo: <input type="text" name="sexo" pattern="[MmFf]" required title="Por favor, insira apenas 'M' ou 'F' (maiúsculo ou minúsculo)"/>
    </label>
    <label>
        <li>Idade: <input type="text" name="idade" pattern="[0-9]+" required title="Por favor, insira uma idade válida."/>
    </label>
    <label>
        <li>Eu me mais descreveria como uma criança (opção única):
            Ativa <input type="radio" name="fk_idSobre" value="1">
            Tímida <input type="radio" name="fk_idSobre" value="2">
            Temperamental <input type="radio" name="fk_idSobre" value="3">
            Esperto <input type="radio" name="fk_idSobre" value="4">
            Mimada <input type="radio" name="fk_idSobre" value="5">
    </label>
    </ul>
    <input type="submit" onclick="alert('Cadastro CRIANÇA feito!')" value="Salvar"/>
</form>

