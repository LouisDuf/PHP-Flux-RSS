<html>
    <h1>Test</h1>
</html>

<?php
//si controller pas objet
//  header('Location: controller/controller.php');

//si controller objet

//chargement config
require_once(__DIR__.'/Config/config.php');

//chargement autoloader pour autochargement des classes
require_once(__DIR__.'/Config/Autoload.php');
Autoload::charger();
 
$controler_user = new UserControler();
//require("Vue/listeNews.php");

//use controleur\frontControl;

//session_start();
//require('Controleur/frontControl.php');
//$front = new frontControl();
