<?php

namespace controleur;

use \config\Validation;

class FrontControler
{

    public function __construct()
    {
        $TabAdmin = array('ajouterFlux', 'supprimerFlux', 'pageConnexion', 'connexion', 'deconnexion', 'ajouterFlux', 'setNbAffiche');
        try {
            if (isset($_REQUEST['action'])) {
                $action = Validation::val_action($_REQUEST['action']);
            }
            else {
                $action = null;
            }

            if (in_array($action, $TabAdmin)) {
                new AdminControler();
            } else {
                new UserControler();
            }
        } catch (Exception $e) {
            global $rep, $vues;
            $tab_erreur[] = "Erreur : ".$e->getMessage();
            require($rep.$vues["erreur"]);
        }
    }
}