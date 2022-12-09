<?php

namespace modele;

class FluxGateway
{
    private $con;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

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

    public function supprimer(int $idFlux)
    {
        $query = 'DELETE FROM tflux WHERE id=:id)';
        $params = array(":id"=>array($idFlux, PDO::PARAM_INT));

        $this->con->executequery($query, $params);
    }

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



}