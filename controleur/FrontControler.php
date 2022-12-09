<?php

namespace controleur;

class FrontControler
{
    //listAction=array('...');

    public function __construct()
    {
        try {
            $action = (isset($_REQUEST['action']) ? $_REQUEST['action'] : null);
            $TabAdmin = array('ajouterFlux', 'supprimerFlux', 'pageConnexion', 'connexion',
                'deconnexion', 'ajouterFlux', 'setNbAffiche');

            if (in_array($action, $TabAdmin)) {
                new adminControl();
            } else {
                new userControl();
            }
        } catch (Exception $ex) {
            //echo vueErreur;
        }
    }
}