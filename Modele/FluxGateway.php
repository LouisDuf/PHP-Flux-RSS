<?php

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

        con->excutequery($query, $params);
    }

    public function getFluxById(int $id)
    {
        $query = 'SELECT * FROM tflux WHERE id=:id';
        $params = array(":id"=>array($id, PDO::PARAM_INT));

        con->excutequery($query, $params);

        $results = $this->con->getResults();

        return new Flux(
            $results[0][0],
            $results[0][1],
            $results[0][2],
            $results[0][3],
            $results[0][4],
            $results[0][5],
            $results[0][6],
            $results[0][7]
        );
    }

}