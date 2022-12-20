<?php

namespace modele;

use function Sodium\add;

class FluxGateway
{
    /**
     * @var Connection
     */
    private $con;

    /**
     * @param Connection $con
     */
    public function __construct(\config\Connection $con)
    {
        $this->con = $con;
    }

    /**
     * @param Flux $flux
     * @return void
     */
    public function add(Flux $flux)
    {
        $query = 'INSERT INTO tflux VALUES(
                         :id,
                         :title,
                         :path,
                         :link,
                         :description,
                         :image_url,
                         :image_titre,
                         :image_link
                         )';
        $params = array(":title"=>array($flux->getTitle(), PDO::PARAM_STR),
            ":path"=>array($flux->getPath(), PDO::PARAM_STR),
            ":link"=>array($flux->getLink(), PDO::PARAM_STR),
            ":description"=>array($flux->getDescription(), PDO::PARAM_STR),
            ":image_url"=>array($flux->getImageUrl(), PDO::PARAM_STR),
            ":image_titre"=>array($flux->getImageTitre(), PDO::PARAM_STR),
            ":image_link"=>array($flux->getImageLink(), PDO::PARAM_STR)
        );

        $this->con->executequery($query, $params);
    }

    /**
     * @param int $idFlux
     * @return void
     */
    public function supprimer(int $idFlux)
    {
        $query = 'DELETE FROM tflux WHERE id=:id)';
        $params = array(":id"=>array($idFlux, PDO::PARAM_INT));

        $this->con->executequery($query, $params);
    }

    /**
     * @param int $id
     * @return Flux
     */
    public function getFluxById(int $id)
    {
        $query = 'SELECT * FROM tflux WHERE id=:id';
        $params = array(":id"=>array($id, PDO::PARAM_INT));

        $this->con->executequery($query, $params);

        $results = $this->con->getResults();

        return new Flux(
            $results[0]["id"],
            $results[0]["title"],
            $results[0]["path"],
            $results[0]["link"],
            $results[0]["description"],
            $results[0]["image_url"],
            $results[0]["image_titre"],
            $results[0]["image_link"]
        );
    }

    public function getAll() {
        $querry = 'SELECT * FROM tflux';
        $this->con->executeQuery($querry);
        $results = $this->con->getResults();

        $liste = array();
        foreach ($results as $row) {
            array_push($liste, new Flux($row["id"],
                                                $row["title"],
                                                $row["path"],
                                                $row["link"],
                                                $row["description"],
                                                $row["image_url"]??"",
                                                $row["image_titre"]??"",
                                                $row["image_link"]??""));
        }
        return $liste;
    }

}