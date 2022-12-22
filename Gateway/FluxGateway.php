<?php
namespace Gateway;

use Config\Connection;
use Metier\Flux;
use PDO;

class FluxGateway
{
    /****************** Déclaration des varaibles GateWays ******************/
    private Connection $con;



    /****************** Constructeur ******************/
    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    /****************** Méthodes d'affichage ******************/
    public function gAfficherFlux(): array
    {
        $querry = "SELECT * FROM tflux";
        $this->con->executeQuery($querry);
        $results = $this->con->getResults();

        $liste = array();
        foreach ($results as $row) {
            $liste[] = new Flux($row["id"],
                $row["title"],
                $row["path"],
                $row["link"],
                $row["description"]);
        }
        return $liste;
    }


    /****************** Méthodes Ajout/Suppression  ******************/
    public function gAddFlux(Flux $flux): void
    {
        $query = "INSERT INTO tflux(title, path, link, description) VALUES(:title, :path, :link, :description)";
        $params = array("title"=>array($flux->getTitle(), PDO::PARAM_STR),
                        "path"=>array($flux->getPath(), PDO::PARAM_STR),
                        "link"=>array($flux->getLink(), PDO::PARAM_STR),
                        "description"=>array($flux->getDescription(), PDO::PARAM_STR)
        );

        $this->con->executequery($query, $params);
    }


    public function gSupprimerFlux(int $idFlux): void
    {
        $query = 'DELETE FROM tflux WHERE id=:id';
        $params = array("id"=>array($idFlux, PDO::PARAM_INT));

        $this->con->executequery($query, $params);
    }



    /****************** Getters ******************/
    public function getFluxById(int $id): Flux
    {
        $query = 'SELECT * FROM tflux WHERE id=:id';
        $params = array("id"=>array($id, PDO::PARAM_INT));

        $this->con->executequery($query, $params);

        $results = $this->con->getResults();

        return new Flux(
            $results[0]["id"],
            $results[0]["title"],
            $results[0]["path"],
            $results[0]["link"],
            $results[0]["description"]
        );
    }

    public function getNbFlux() {
        $query = "SELECT count(*) FROM tflux";
        $this->con->executeQuery($query);
        return $this->con->getResults()[0][0];
    }

    public function getFluxByPage($page, $nbFluxByPage): array
    {
        $query = "SELECT * FROM tflux LIMIT :nbFlux OFFSET :from";
        $params = array('nbFlux' => array($nbFluxByPage, PDO::PARAM_INT),
                        'from' => array(($page-1)*$nbFluxByPage, PDO::PARAM_INT));

        $this->con->executeQuery($query, $params);

        $liste = array();
        $results = $this->con->getResults();
        foreach ( $results as $row) {
            $liste[] = new Flux($row["id"],
                $row["title"],
                $row["path"],
                $row["link"],
                $row["description"]);
        }
        return $liste;
    }
}