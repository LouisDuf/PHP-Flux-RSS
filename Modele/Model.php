<?php

class Model
{
    function __construct() {}

    function getAllNews() {
        global $base, $login, $mdp;
        $news_g = new NewsGateway(new Connection($base, $login, $mdp));
        return $news_g->getAll();
    }
}