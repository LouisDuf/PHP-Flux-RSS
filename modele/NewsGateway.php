<?php
namespace modele;

use config\Connection;
use DateTime;
use \PDO;

class NewsGateway
{
    private Connection $co;

    /**
     * @param $co
     */
    public function __construct(Connection $co)
    {
        $this->co = $co;
    }

    /**
     * @param News $n
     * @return void
     */
    public function addNews(News $n)
    {
        $querry = "INSERT INTO tnews(flux, titre, description, url, guid, date) VALUES (:flux, :titre, :descirpion, :url, :guid, :date)";
        $params = array("flux" => array($n->getFlux(), PDO::PARAM_STR),
                        "titre" => array($n->getTitre(), PDO::PARAM_STR),
                        "description" => array($n->getDescription(), PDO::PARAM_STR),
                        "url" => array($n->getUrl(), PDO::PARAM_STR),
                        "guid" => array($n->getGuid(), PDO::PARAM_STR),
                        "date" => array($n->getDate(), PDO::PARAM_STR),
        );
        $this->co->executeQuery($querry, $params);
    }

    /**
     * @param int $id
     * @return News
     */
    public function getNewsById(int $id) : News
    {
        $querry = "SELECT * FROM tnews WHERE id=:id";
        $params = array("id" => array($id, PDO::PARAM_INT));
        $this->co->executeQuery($querry, $params);

        $results = $this->co->getResults();

        return new News($results[0]["id"],
                        $results[0]["title"],
                        $results[0]["description"],
                        $results[0]["url"],
                        $results[0]["guid"],
                        $results[0]["datePub"],
                        $results[0]["flux"]);
    }

    /**
     * @param int $page
     * @param int $nbNews
     * @return array
     */
    public function getNewsByPage(int $page, int $nbNews) {
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
                DateTime::createFromFormat('Y-m-d', $row['datepub']),
                $row["flux"]);
        }
        return $liste_News;
    }

    /**
     * @return mixed
     */
    public function getNbNews() {
        $querry = "SELECT count(*) FROM tnews";
        $this->co->executeQuery($querry);

        $results = $this->co->getResults();
        return $results[0][0];
    }

    /**
     * @return array
     */
    public function displayPGSQL()
    {
        $querry = "SELECT * FROM tnews";
        $this->co->executeQuery($querry);

        $results = $this->co->getResults();

        $liste_News = array();
        foreach ($results as $row)
        {
            array_push($liste_News, new News(intval(
                $row['id']),
                $row['title'],
                $row['description'],
                $row["url"],
                $row["guid"],
                DateTime::createFromFormat('Y-m-d', $row['datepub']),
                intval($row['flux'])));
        }
        return $liste_News;
    }
}