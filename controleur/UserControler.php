<?php

namespace controleur;

use config\Validation;
use modele\NewsModel;

class UserControler
{
    function __construct()
    {
        global $rep,$vues;
        session_start();

        $tab_erreur = array();

        try {
            $action = $_REQUEST['action']??null;
            if ($action != null) {
                Validation::val_action($action);
            }
            switch ($action) {
                case NULL :
                    $this->start();
                    break;
                default :
                    $tab_erreur[] = "Erreur : Action inconnue";
                    require($rep.$vues["erreur"]);
            }
        } catch (PDOException $e) {
            $tab_erreur[] = "Erreur : ".$e->getMessage();
            require($rep.$vues["erreur"]);
        } catch (Exception $e) {
            $tab_erreur[] = "Erreur inattendue : ".$e->getMessage();
            require($rep.$vues["erreur"]);
        }

        exit(0);
    }

    function start() {
        global $rep,$vues;
        $model = new NewsModel();
        $tabNews = $model->getAllNews();
        require($rep.$vues['accueil']);
    }
}