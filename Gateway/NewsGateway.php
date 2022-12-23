<?php
namespace Gateway;

use Config\Connection;
use DateTime;
use Metier\News;
use PDO;

class NewsGateway
{
    /****************** Déclaration des varaibles GateWays ******************/
    private Connection $co;

    /****************** Constructeur ******************/
    public function __construct(Connection $co)
    {
        $this->co = $co;
    }

    /****************** Méthodes Ajout/Suppression  ******************/

    // Ajout
    public function gAddNews(News $n): void
    {
        $querry = "INSERT INTO tnews(flux, title, url, guid, description, datePub) VALUES (:flux, :title, :url, :guid, :description, :datePub)";
        $params = array("flux" => array($n->getFlux(), PDO::PARAM_STR),
                        "title" => array($n->getTitle(), PDO::PARAM_STR),
                        "url" => array($n->getUrl(), PDO::PARAM_STR),
                        "guid" => array($n->getGuid(), PDO::PARAM_STR),
                        "description" => array($n->getDescription(), PDO::PARAM_STR),
                        "datePub" => array($n->getDate(), PDO::PARAM_STR),
        );
        $this->co->executeQuery($querry, $params);
    }

    // Suppression
    public function removeOldestNews(): void
    {
        $query = 'DELETE FROM tnews WHERE datePub=(SELECT min(datePub)
                                                   FROM tnews)';
        $this->co->executeQuery($query);
    }


    /****************** Getters ******************/
    public function getNewsByPage(int $page, int $nbNews): array
    {
        $querry = "SELECT * FROM tnews ORDER BY datePub DESC LIMIT :n OFFSET :p";
        $args = array('p' => array(($page-1)*$nbNews, PDO::PARAM_INT),
                      'n' => array($nbNews, PDO::PARAM_INT));

        $this->co->executeQuery($querry, $args);
        $results = $this->co->getResults();

        $liste_News = array();
        foreach ($results as $row) {
            $liste_News[] = new News($row["id"],
                $row["title"],
                $row["description"],
                $row["url"],
                $row["guid"],
                DateTime::createFromFormat('Y-m-d',$row['datepub']),
                $row["flux"]);
        }
        return $liste_News;
    }

    public function getNbNews() {
        $querry = "SELECT count(*) FROM tnews";
        $this->co->executeQuery($querry);

        $results = $this->co->getResults();
        return $results[0][0];
    }

    public function getOldestNews(): News
    {
        $query = 'SELECT * FROM tnews WHERE datePub=(SELECT min(datePub)
                                                     FROM tnews)';
        $this->co->executeQuery($query);

        $results = $this->co->getResults();
        return new News(intval(
            $results[0]['id']),
            $results[0]['title'],
            $results[0]['description'],
            $results[0]["url"],
            $results[0]["guid"],
            DateTime::createFromFormat('D, d M Y H:i:s T', $results[0]['datepub']),
            intval($results[0]['flux']));
    }

    public function getNewsByGuid(string $guid): array
    {
        $querry = "SELECT * FROM tnews WHERE guid=:guid";
        $params = array("guid" => array($guid, PDO::PARAM_STR));
        $this->co->executeQuery($querry, $params);

        $results = $this->co->getResults();

        $liste_News = array();
        foreach ($results as $row)
        {
            $liste_News[] = new News(intval(
                $row['id']),
                $row['title'],
                $row['description'],
                $row["url"],
                $row["guid"],
                DateTime::createFromFormat('Y-m-d',$row['datepub']),
                intval($row['flux']));
        }
        return $liste_News;
    }
}