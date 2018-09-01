<?php
/* Fichier d'amorçage.
   Crée un nouvel objet app pour venir ensuite trouver le contôleur
   qui correspond à l'url puis séléctionne le modèle et la vue
*/
session_start();

// définition de la racine de l'url pour la réécriture d'url
define( 'ROOT', str_replace( 'public/index.php', '', $_SERVER['SCRIPT_FILENAME'] ) );

require_once ROOT . 'app/core/App.php';
require_once ROOT . 'app/core/Controller.php';
require_once ROOT . 'app/core/DB.php';

$app = new App;
