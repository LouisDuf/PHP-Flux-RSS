<?php

class UserControler
{
    function __construct()
    {
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
                    require("./Vue/err.php");
            }
        } catch (PDOException $e) {
            $tab_erreur[] = "Erreur : pas de BD";
            require("../Vue/err.php");
        } catch (Exception $e) {
            $tab_erreur[] = "Erreur inattendue";
            require("../Vue/err.php");
        }

        exit(0);
    }

    function start() {
        $news_g = new NewsGateway(new Connection("mysql:host=londres.uca.local;dbname=dbreregnault", "reregnault", "achanger"));
        $liste_news = $news_g.getAll();
        require("../Vue/lesNews.php");
    }
}