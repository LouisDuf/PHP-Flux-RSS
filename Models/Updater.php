<?php

namespace Models;

use Config\Cleaner;
use Metier\Flux;
use Metier\News;
use DOMDocument;
use DateTime;

class Updater
{
    /****************** Déclaration des varaibles GateWays ******************/
    private Model $model;

    /****************** Constructeur ******************/
    public function __construct() {
        $this->model = new Model();
        $this->updateDatabase();
    }

    /****************** Méthodes ******************/
    /**
     * @param Flux $flux
     * @return void
     */
    private function updateNewsFromFlux(Flux $flux): void
    {
        $parseur = new DOMDocument();
        $parseur->load($flux->getLink());

        foreach ($parseur->getElementsByTagName("item") as $key => $node)
        {
            $id = $key;
            if (isset($node->getElementsByTagName("title")[0]->nodeValue))
            {
                $titre = Cleaner::NettoyageStr($node->getElementsByTagName("title")[0]->nodeValue);

            }
            else
            {
                $titre = "titre_Vide";
            }
            if (isset($node->getElementsByTagName("description")[0]->nodeValue))
            {
                $description = Cleaner::NettoyageStr($node->getElementsByTagName("description")[0]->nodeValue);
            }
            else
            {
                $description = "description_Vide";
            }

            if (isset($node->getElementsByTagName("link")[0]->nodeValue))
            {
                $link = Cleaner::NettoyageURL($node->getElementsByTagName("link")[0]->nodeValue);
            }
            else
            {
                $link = "liens_Vide";
            }
            if (isset($node->getElementsByTagName("pubDate")[0]->nodeValue))
            {
                $date = DateTime::createFromFormat('D, d M Y H:i:s T', $node->getElementsByTagName("pubDate")[0]->nodeValue);
                var_dump($date);
            }
            else
            {
                $date = "date_Vide";
            }
            $newNews = new News($id, $titre, $description, $link, $link, $date, $flux->getId());
            $this->model->addNews($newNews);
        }
    }

    public function updateDatabase(): void
    {
        foreach ($this->model->getAllFlux() as $flux) {
            $this->updateNewsFromFlux($flux);
        }
    }
}