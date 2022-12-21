<?php


//si controller pas objet
//  header('Location: controller/controller.php');

//si controller objet

//chargement config
require_once(__DIR__ . '/config/config.php');

//chargement autoloader pour autochargement des classes
require_once(__DIR__ . '/config/SplClassLoader.php');
$myLibLoader = new SplClassLoader('controleur', './');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('config', './');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('models', './');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('gateway', './');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('metier', './');
$myLibLoader->register();
 
$controler_user = new \controleur\FrontControler();

//require("Vue/listeNews.php");
