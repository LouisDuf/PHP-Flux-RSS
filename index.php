<?php

use Controleur\FrontControler;

//chargement Config
require_once(__DIR__ . '/Config/config.php');

//chargement autoloader pour autochargement des classes
require_once(__DIR__ . '/Config/SplClassLoader.php');
$myLibLoader = new SplClassLoader('Controleur', './');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('Config', './');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('Models', './');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('Gateway', './');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('Metier', './');
$myLibLoader->register();
 
//$update = new Models\Updater();

$controler_user = new FrontControler();

