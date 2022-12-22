<?php

namespace models;

use config\Cleaner;
use metier\Flux;
use metier\News;
use models\Model;
use DOMDocument;
use DateTime;

class Updater
{
    private Model $model;
    public function __construct() {
        $this->model = new Model();
        $this->updateDatabase();
    }

    private function updateNewsFromFlux(Flux $flux)
    {
        $parseur = new DOMDocument();
        $parseur->load($flux->getLink());

        $maList = array();
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
                //var_dump($node->getElementsByTagName("pubDate")[0]->nodeValue);
                $date = DateTime::createFromFormat('D, d M Y H:i:s T', $node->getElementsByTagName("pubDate")[0]->nodeValue);
                //$date = $date->format('Y-m-d');
                //var_dump($date);
                //$date = $node->getElementsByTagName("pubDate")[0]->nodeValue;
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

            $newNews = new News($id, $titre, $description, $link, $link, $date, $flux->getId());
            $this->model->addNews($newNews);
        }
    }

    public function updateDatabase() {
        foreach ($this->model->getAllFlux() as $flux) {
            $this->updateNewsFromFlux($flux);
        }
    }
}