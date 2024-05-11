<?php
session_start();
ob_start();

define('C7E3L8K9E5', true);

//CARREGAR O COMPOSER
require './vendor/autoload.php';

//TRATAR A URL
$url = new Core\ConfigController();

//CARREGAR A PG/CONTROLLER
$url->loadPage();
?>

