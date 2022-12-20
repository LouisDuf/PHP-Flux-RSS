<?php

//gen
$rep=__DIR__.'/../';

// liste des modules à inclure

//$dConfig['includes']= array('controleur/Validation.php');

//BD
$base="pgsql:host=localhost;dbname=louloudb";
$login="loulou";
$mdp="dbloulou";


//$base="pgsql:host=localhost;dbname=dbprojetphp";
//$login="remi";
//$mdp="achanger";


//Vues
$vues['erreur']='Vue/erreur.php';
$vues['accueil']='Vue/listeNews.php';
$vues['login']='Vue/connection.php';
$vues['flux']='Vue/listeFlux.php';
$vues['formulaireFlux']='Vue/formulaireFlux.php';


?>
