<?php

namespace controleur;

use config\Cleaner;
use Exception;
use models\AdminModel;
use PDOException;

class FrontControler
{
    public function __construct()
    {

        $TabAdmin = array('deconnexion', 'afficherFlux', 'supprimerFlux', 'pageAjoutFlux', 'ajouterFlux', 'pageParams', 'setNewsParPage', 'setFluxParPage');

        session_start();

        try {
            if (isset($_REQUEST['action'])) {
                $action = Cleaner::NettoyageStr($_REQUEST['action']);
            }
            else {
                $action = null;
            }

            if (in_array($action, $TabAdmin)) {
                $model_admin = new AdminModel();
                $admin = $model_admin->isAdmin();
                if ($admin != null) {
                    new AdminControler();
                } else {
                    global $rep, $vues;
                    require($rep.$vues['login']);
                }
            } else {
                new UserControler();
            }
        } catch (PDOException|Exception $e) {
            global $rep, $vues;
            $tab_erreur[] = "Erreur : ".$e->getMessage();
            require($rep.$vues["erreur"]);
        }
    }
}