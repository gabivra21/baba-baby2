<?php
<<<<<<< HEAD

=======
>>>>>>> 56df33c994b14b6d8d741d325c45b6380dd1b83e

$db_name = 'babababy_';
$db_host = '127.0.0.1';
$db_port = '3306';
$db_user = 'root';
$db_password = 'PUC@1234';

try
{
    $pdo = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_name", $db_user, $db_password);
}catch(Exception $e){
    echo "Erro ao carregar página: ".$e->getMessage();
}

?>
