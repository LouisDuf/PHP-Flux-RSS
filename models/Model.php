<?php

namespace models;


use config\Connection;
use gateway\NewsGateway;
use gateway\FluxGateway;

class Model
{

    /****************** Déclaration des varaibles GateWays ******************/
    private FluxGateway $flux_g;
    private NewsGateway $news_g;
    
    /****************** Constructeur ******************/

    public function __construct() {
        global $base, $login, $mdp;
        $this->news_g = new NewsGateway(new Connection($base, $login, $mdp));
        $this->flux_g = new FluxGateway(new Connection($base, $login, $mdp));
    }

    /****************** Méthodes d'affichage ******************/

    /****************** Méthodes Ajout/Suppression  ******************/
 
    // Ajout

    public function addFlux($flux){
        $this->flux_g->gAddFlux($flux);
    }

    public function addNews($newNews){
        $this->news_g->gAddNews($newNews);
    }

    // Suppression

    public function supprimerFlux($idFlux){
        $this->flux_g->gSupprimerFlux($idFlux);
    }

    public function supprimerNews($newNews){
        $this->news_g->gSupprimerNews($newNews);
    }

    /****************** Getters ******************/

    // Flux 
    public function getFluxById($id) {
        return $this->flux_g->getFluxById($id);
    }

    public function getAllFlux() {
        $liste = $this->flux_g->gAfficherFlux();

        return $liste;
    }

    public function getFluxByPage($page, $nbFluxByPage) {
        return $this->flux_g->getFluxByPage($page, $nbFluxByPage);
    }

    public function getNbFlux() {
        return $this->flux_g->getNbFlux();
    }

    // News 
    public function getAllNews() {
        return $this->news_g->gAfficherNews();
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
}