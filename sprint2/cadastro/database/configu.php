<?php

$db_name = 'bbby';
$db_host = 'localhost';
$db_port = '3306';
$db_user = 'root';
$db_password = '';

try
{
    $pdo = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_name", $db_user, $db_password);
}catch(Exception $e){
    echo "Erro ao carregar página: ".$e->getMessage();
}


?>