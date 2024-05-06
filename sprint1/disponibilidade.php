<h3>Disponibilidade</h3>

<form method="POST" action=".php">
    <p>
        <li> Dias disponíveis:
    <ul>
    <label>
        Segunda-feira <input type="checkbox" name="dia" value=1>
        Terça-feira <input type="checkbox" name="dia" value=2>
        Quarta-feira <input type="checkbox" name="dia" value=3>
        Quinta-feira <input type="checkbox" name="dia" value=4>
        Sexta-feira <input type="checkbox" name="dia" value=5>
        Sábado <input type="checkbox" name="dia" value=6>
        Domingo <input type="checkbox" name="dia" value=7><br>
    </label>
    </ul>
        <li>Turnos disponíveis:
    <ul>
    <label>
        Manhã <input type="checkbox" name="turno" value=1>
        Tarde <input type="checkbox" name="turno" value=2>
        Noite <input type="checkbox" name="turno" value=3>
    </label> 
    </p>
    </ul>
    <input type="submit" value="Salvar">
</form>