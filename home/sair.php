<?php
session_start();
unset($_SESSION['idUsuario'], $_SESSION['nome']);
$_SESSION['msgErro'] = "Deslogado com sucesso!";

header("Location: index.php");
