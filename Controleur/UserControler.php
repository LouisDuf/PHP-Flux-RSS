<?php

namespace Controleur;

use Config\Validation;
use Exception;
use Config\Cleaner;
use Models\AdminModel;
use Models\Model;
use PDOException;
use Metier\Flux;

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

    function start(): void
    {
        global $rep,$vues;
        $model = new Model();
        $page = $_REQUEST['page']??null;
        if ($page == null) {
            $page = 1;
        }
        else {
            if (Validation::val_int($page)) {
                $page = abs(Cleaner::NettoyageInt($page));
                if ($page==0) {
                    $page=1;
                }
            }
            else {
                $tab_erreur[] = "Numéro de page invalide : ".$page." n'est pas un numéro.";
                require($rep.$vues["erreur"]);
                return;
            }

        }
        $nbNewsParPage = $model->getNbNewsParPage();
        $tabNews = $model->getNewsByPage($page, $nbNewsParPage);

        $nbNewsTot = $model->getNbNews();
        $pageMax = ceil($nbNewsTot/$nbNewsParPage);

        if ($page>$pageMax) {
            $tab_erreur[] = "Numéro de page invalide : ".$pageMax." est la page maximale.";
            require($rep.$vues["erreur"]);
            return;
        }

        $tabFlux = array();
        foreach ($model->getAllFlux() as $flux) {
            $tabFlux[$flux->getId()] = $flux;
        }

        require($rep.$vues['accueil']);
    }

    function pageConnexion($msg): void
    {
        global $rep, $vues;
        if ($msg != null) {
            $message = $msg;
        }
        require($rep.$vues['login']);
    }

    function connexion(): void
    {
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