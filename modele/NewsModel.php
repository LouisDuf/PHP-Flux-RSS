<?php

namespace modele;

class NewsModel
{
    function __construct() {}

    function getAllNews() {
        global $base, $login, $mdp;
        $news_g = new \modele\NewsGateway(new \config\Connection($base, $login, $mdp));
        return $news_g->getAll();
    }
}