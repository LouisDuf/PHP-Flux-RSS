<?php

namespace models;

use metier\Flux;
use metier\News;
use config\Connection;
use gateway\NewsGateway;
use gateway\FluxGateway;

class Model
{

    /****************** Déclaration des varaibles GateWays ******************/
    private NewsGateway $news_g;
    private FluxGateway $flux_g;

    /****************** Constructeur ******************/

    public function __construct() {
        global $base, $login, $mdp;
        $this->news_g = new NewsGateway(new Connection($base, $login, $mdp));
        $this->flux_g = new FluxGateway(new Connection($base, $login, $mdp));
    }


    /****************** Méthodes d'affichage ******************/

    /****************** Méthodes Ajout/Suppression  ******************/
 
    // Ajout

    public function addFlux($flux): void
    {
        $this->flux_g->gAddFlux($flux);
    }

    public function addNews($newNews): void
    {
        $this->news_g->gAddNews($newNews);
    }

    // Suppression

    public function supprimerFlux($idFlux): void
    {
        $this->flux_g->gSupprimerFlux($idFlux);
    }

    public function supprimerNews($newNews): void
    {
        $this->news_g->gSupprimerNews($newNews);
    }

    /****************** Getters ******************/

    // Flux 
    public function getFluxById($id): Flux
    {
        return $this->flux_g->getFluxById($id);
    }

    public function getAllFlux(): array
    {
        return $this->flux_g->gAfficherFlux();
    }

    public function getFluxByPage($page, $nbFluxByPage): array
    {
        return $this->flux_g->getFluxByPage($page, $nbFluxByPage);
    }

    public function getNbFlux() {
        return $this->flux_g->getNbFlux();
    }

    // News 
    public function getAllNews(): array
    {
        return $this->news_g->gAfficherNews();
    }

    public function getNewsByPage($page, $nbPage): array
    {
        return $this->news_g->getNewsByPage($page, $nbPage);
    }

    public function getNbNews(){
        return $this->news_g->getNbNews();
    }

    public function getNewsById($idNews): News
    {
        return $this->news_g->getNewsById($idNews);
    }
}