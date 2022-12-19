<?php

//gen
$rep=__DIR__.'/../';

// liste des modules à inclure

//$dConfig['includes']= array('controleur/Validation.php');

//BD
//$base="pgsql:host=localhost;dbname=louisdb";
//$login="louis";
//$mdp="dbloulou";


$base="pgsql:host=localhost;dbname=dbprojetphp";
$login="remi";
$mdp="achanger";

//$base="mysql:host=londres.uca.local;dbname=dbreregnault";
//$login="reregnault";
//$mdp="achanger";


//Vues
$vues['erreur']='Vue/erreur.php';
$vues['accueil']='Vue/listeNews.php';
$vues['login']='Vue/connection.php';
$vues['flux']='Vue/listeFlux.php';


?>
