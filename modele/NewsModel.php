<?php

namespace modele;

use config\Connection;

class NewsModel
{
    private  $news_g;

    /**
     * Constructeur News
     */
    public function __construct() {
        global $base, $login, $mdp;
        $this->news_g = new NewsGateway(new Connection($base, $login, $mdp));
    }

    /**
     * @return array
     */
    public function getAllNews() {
        return $this->news_g->displayPGSQL();
    }

    /**
     * @param $page
     * @param $nbPage
     * @return array
     */
    public function getNewsByPage($page, $nbPage){
        return $this->news_g->getNewsByPage($page, $nbPage);
    }

    /**
     * @return mixed
     */
    public function getNbNews(){
        return $this->news_g->getNbNews();
    }

    /**
     * @param $idNews
     * @return News
     */
    public function getNewsById($idNews){
        return $this->news_g->getNewsById($idNews);
    }

    /**
     * @param $newNews
     * @return void
     */
    public function addNews($newNews){
        $this->news_g->addNews($newNews);
    }
}