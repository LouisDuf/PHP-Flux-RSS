<?php

namespace modele;

use config\Connection;

class NewsModel
{
    private  $news_g;

    public function __construct() {
        global $base, $login, $mdp;
        $this->news_g = new NewsGateway(new Connection($base, $login, $mdp));
    }

    public function getAllNews() {
        return $this->news_g->displayPGSQL();
    }

    public function getNewsByPage($page, $nbPage){
        return $this->news_g->getNewsByPage($page, $nbPage);
    }

    public function getNbNews(){
        return $this->news_g->getNbNews();
    }

    public function getNewsById($idNews){
        return $this->news_g->getNewsById($idNews);
    }

    public function addNews($newNews){
        $this->news_g->addNews($newNews);
    }
}