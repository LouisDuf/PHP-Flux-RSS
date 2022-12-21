<?php

use controleur\FrontControler;

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
 
$model = new models\Model();
$fluxs = $model->getAllFlux();

foreach($fluxs as $flux){
    $model->loadNews($flux);
}

$controler_user = new FrontControler();

