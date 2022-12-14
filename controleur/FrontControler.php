<?php

namespace controleur;

use config\Cleaner;
use controleur\UserControler;
use controleur\AdminControler;

class FrontControler
{

    public function __construct()
    {
        $TabAdmin = array('ajouterFlux', 'supprimerFlux', 'pageConnexion', 'connexion', 'deconnexion', 'ajouterFlux', 'setNbAffiche');
        session_start();
        try {
            if (isset($_REQUEST['action'])) {
                $action = Cleaner::NettoyageStr($_REQUEST['action']);
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