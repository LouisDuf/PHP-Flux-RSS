<?php

//gen
$rep=__DIR__.'/../';

// liste des modules à inclure

//$dConfig['includes']= array('controleur/Validation.php');



//BD
//$base="pgsql:host=localhost;dbname=louloudb";
//$login="louis";
//$mdp="dbloulou";

$base="mysql:host=londres.uca.local;dbname=dbreregnault";
$login="reregnault";
$mdp="achanger";

//Vues
$vues['erreur']='Vue/erreur.php';
$vues['accueil']='Vue/listeNews.php';
$vues['login']='Vue/connection.php';


?>