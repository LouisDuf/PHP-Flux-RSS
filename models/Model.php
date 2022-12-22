<?php

namespace models;


use metier\Flux;
use metier\News;
use config\Connection;
use gateway\NewsGateway;
use gateway\FluxGateway;
use gateway\ParamsGateway;

class Model
{

    /****************** Déclaration des varaibles GateWays ******************/
    private NewsGateway $news_g;
    private FluxGateway $flux_g;
    private ParamsGateway $params_g;

    /****************** Constructeur ******************/

    public function __construct() {
        global $base, $login, $mdp;
        $this->news_g = new NewsGateway(new Connection($base, $login, $mdp));
        $this->flux_g = new FluxGateway(new Connection($base, $login, $mdp));
        $this->params_g = new ParamsGateway(new Connection($base, $login, $mdp));
    }

    /****************** Méthodes Ajout/Suppression  ******************/
    public function addFlux($flux): void
    {
        $this->flux_g->gAddFlux($flux);
    }

    // Suppression
    public function supprimerFlux($idFlux): void
    {
        $this->flux_g->gSupprimerFlux($idFlux);
    }

    public function faireLeMenageDansLesNews() {
        $nbNews = $this->getNbNews();
        $nbNewsMax = $this->getNbNewsMax();

        while ($nbNews > $nbNewsMax) {
            $this->news_g->removeOldestNews();
            $nbNews = $nbNews - 1;
        }
    }

    public function addNews(News $new_news) {
        $news_same_guid = $this->news_g->getNewsByGuid($new_news->getGuid());
        if (!$news_same_guid) {
            $nbNews = $this->getNbNews();
            $nbNewsMax=$this->getNbNewsMax();
            if ($nbNews>=$nbNewsMax) {
                $oldest_news = $this->getOldestNews();
                if ($oldest_news->getDate() < $new_news) {
                    $this->news_g->removeOldestNews();
                    $this->news_g->gAddNews($new_news);
                }
            }
            else {
                $this->news_g->gAddNews($new_news);
            }
        }
    }

    /****************** Getters ******************/
    // Flux
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

    public function getNewsByPage($page, $nbPage): array
    {
        return $this->news_g->getNewsByPage($page, $nbPage);
    }

    public function getNbNews(){
        return $this->news_g->getNbNews();
    }

    public function getNbNewsParPage() {
        return $this->params_g->getNbNewsParPage();
    }

    public function getNbFluxParPage() {
        return $this->params_g->getNbFluxParPage();
    }

    public function getNbNewsMax() {
        return $this->params_g->getNbNewsMax();
    }

    public function getOldestNews() {
        return $this->news_g->getOldestNews();
    }

    /****************** Setters ******************/

    public function setNbNewsParPage(int $newValue) {
        return $this->params_g->setNbNewsParPage($newValue);
    }

    public function setNbFluxParPage(int $newValue) {
        return $this->params_g->setNbFluxParPage($newValue);
    }

    public function setNbNewsMax(int $newValue) {
        return $this->params_g->setNbNewsMax($newValue);
    }
}