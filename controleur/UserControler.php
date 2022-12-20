<?php

namespace controleur;

use config\Cleaner;
use config\Validation;
use modele\AdminModel;
use modele\NewsModel;

class UserControler
{
    function __construct()
    {
        global $rep,$vues;

        $tab_erreur = array();

        try {
            $action = $_REQUEST['action']??null;
            if ($action != null) {
                $action = Cleaner::NettoyageStr($action);
            }
            switch ($action) {
                case NULL :
                    $this->start();
                    break;
                case 'pageConnexion':
                    $this->pageConnexion(null);
                    break;
                case 'connexion':
                    $this->connexion();
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

    /**
     * @return void
     */
    function start() {
        global $rep,$vues;
        $model = new NewsModel();
        $page = $_REQUEST['page']??null;
        if ($page == null) {
            $page = 1;
        }
        else {
            $page = abs(Cleaner::NettoyageInt($page));
            if ($page==0) {
                $page=1;
            }
        }
        $tabNews = $model->getNewsByPage($page, 10);

        $nbNewsTot = $model->getNbNews();
        $pageMax = ceil($nbNewsTot/10);

        require($rep.$vues['accueil']);
    }

    function pageConnexion($msg) {
        global $rep, $vues;
        if ($msg != null) {
            $message = $msg;
        }
        require($rep.$vues['login']);
    }

    function connexion() {
        $admin = new AdminModel();
        $login = Cleaner::NettoyageStr($_POST['login']);
        $mdp = Cleaner::NettoyageStr($_POST['password']);
        $resultat = $admin->connecter($login, $mdp);

        if($resultat != null) {
            $this->start();
        }
        else{
            $this->pageConnexion("Identifiants Inconnus : login=".$login."/password=".$mdp);
        }
    }
}