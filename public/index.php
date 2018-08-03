<?php
session_start();

define( 'ROOT', str_replace( 'public/index.php', '', $_SERVER['SCRIPT_FILENAME'] ) );

require_once ROOT . 'app/core/App.php';
require_once ROOT . 'app/core/Controller.php';
require_once ROOT . 'app/core/DB.php';

$app = new App;
