<?php
session_start(); // Inicia a sessão
unset($_SESSION['idUsuario'], $_SESSION['nome']);
$_SESSION['msgErro'] = "Deslogado com sucesso!";


define("BASE_URL_INDEX","http://localhost/baba-baby2/index.php");
header("Location:".BASE_URL_INDEX);
