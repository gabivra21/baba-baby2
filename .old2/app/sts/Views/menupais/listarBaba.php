<?php

echo "View - listar babas<br>";
//var_dump($this->dados);

foreach($this->dados['babas'] as $baba){
    //var_dump($baba);
    extract($baba);
    echo "ID: $idBaba <br>";
    echo "Nome: $nome <br>";
    echo "Tempo Experiência: $tempoExp <br>";
    echo "Valor/turno: $valor <br>";
    echo "<hr>";
}