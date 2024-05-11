<?php
session_start();
ob_start();

define('C7E3L8K9E5', true);

require './vendor/autoload.php';

$url = new Core\ConfigController();

$url->loadPage();
?>

