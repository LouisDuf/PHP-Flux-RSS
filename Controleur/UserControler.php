<?php

class UserControler
{
    function __construct()
    {
        global $rep,$vues;
        session_start();

        $tab_erreur = array();

        try {
            $action = $_REQUEST['action'];
            switch ($action) {
                case NULL :
                    $this->start();
                    break;
                default :
                    $tab_erreur[] = "Erreur : Action inconnue";
                    require($rep.$vues["erreur"]);
            }
        } catch (PDOException $e) {
            $tab_erreur[] = "Erreur : pas de BD";
            require($rep.$vues["erreur"]);
        } catch (Exception $e) {
            $tab_erreur[] = "Erreur inattendue";
            require($rep.$vues["erreur"]);
        }

        exit(0);
    }

    function start() {
        global $rep,$vues;
        $news_g = new NewsGateway(new Connection("mysql:host=londres.uca.local;dbname=dbreregnault", "reregnault", "achanger"));
        $liste_news = $news_g.getAll();
        require($rep.$vues["accueil"]);
    }
}