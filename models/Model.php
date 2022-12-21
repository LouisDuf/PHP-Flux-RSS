<?php

namespace models;

use DOMDocument;
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
 
    // Ajout
    public function loadNews(Flux $flux)
    {
        $parseur = new DOMDocument();
        $parseur->load($flux->getLink());
        //$parseur->load("http://feeds.feedburner.com/phoenixjp/");
        //$parseur->load("http://feeds.bbci.co.uk/news/world/rss.xml");

        $maList = array();
        foreach ($parseur->getElementsByTagName("item") as $key => $node)
        {
            $id = $key;
            if (isset($node->getElementsByTagName("title")[0]->nodeValue))
            {
                $titre = $node->getElementsByTagName("title")[0]->nodeValue;

            }
            else
            {
                $titre = "titre_Vide";
            }
            if (isset($node->getElementsByTagName("description")[0]->nodeValue))
            {
                $description = $node->getElementsByTagName("description")[0]->nodeValue;
            }
            else
            {
                $description = "description_Vide";
            }

            if (isset($node->getElementsByTagName("link")[0]->nodeValue))
            {
                $link = $node->getElementsByTagName("link")[0]->nodeValue;
            }
            else
            {
                $link = "liens_Vide";
            }
            if (isset($node->getElementsByTagName("pubDate")[0]->nodeValue))
            {
                $date = $node->getElementsByTagName("pubDate")[0]->nodeValue;
            }
            else
            {
                $date = "date_Vide";
            }

            $item = [
                'id' => $id,
                'title' => $titre,
                'desc' => $description,
                'link' => $link,
                'date' => $date,
            ];
            $maList[] = $item;

            if(count($maList) != 500)
            {
                $newNews = new News($id, $titre, $description, $link, $link, $date, $flux->getId());
                $this->news_g->gAddNews($newNews);
            }
            else
            {
                echo "la liste est pleine";
            }
        }
    }

    public function addFlux($flux): void
    {
        $this->flux_g->gAddFlux($flux);
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

    public function faireLeMenageDansLesNews() {
        $nbNews = $this->getNbNews();
        $nbNewsMax = $this->getNbNewsMax();

        while ($nbNews > $nbNewsMax) {
            $this->news_g->removeOldestNews();
            $nbNews = $nbNews - 1;
        }
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
        return $this->news_g->getAllNews();
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

    public function getNbNewsParPage() {
        return $this->params_g->getNbNewsParPage();
    }

    public function getNbFluxParPage() {
        return $this->params_g->getNbFluxParPage();
    }

    public function getNbNewsMax() {
        return $this->params_g->getNbNewsMax();
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