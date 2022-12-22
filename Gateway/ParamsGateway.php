<?php

namespace Gateway;

use Config\Connection;
use PDO;

class ParamsGateway
{
    /****************** Déclaration des attributs ******************/
    private Connection $con;

    /****************** Constructeur ******************/
    public function __construct(Connection $con) {
        $this->con = $con;
    }

    /****************** Getters ******************/
    public function getNbNewsParPage() {
        $query = "SELECT * FROM tParams WHERE param='nbNewsParPage'";

        $this->con->executeQuery($query);

        return $this->con->getResults()[0]['value'];
    }

    public function getNbFluxParPage() {
        $query = "SELECT * FROM tParams WHERE param='nbFluxParPage'";

        $this->con->executeQuery($query);

        return $this->con->getResults()[0]['value'];
    }

    public function getNbNewsMax() {
        $query = "SELECT * FROM tParams WHERE param='nbNewsTotal'";

        $this->con->executeQuery($query);

        return $this->con->getResults()[0]['value'];
    }

    /****************** Setters ******************/
    /**
     * @param int $newValue
     * @return void
     */
    public function setNbFluxParPage(int $newValue): void
    {
        $query = "UPDATE tParams SET value=:val WHERE param='nbFluxParPage'";
        $params = array('val' => array($newValue, PDO::PARAM_INT));

        $this->con->executeQuery($query, $params);
    }

    /**
     * @param int $newValue
     * @return void
     */
    public function setNbNewsParPage(int $newValue): void
    {
        $query = "UPDATE tParams SET value=:val WHERE param='nbNewsParPage'";
        $params = array('val' => array($newValue, PDO::PARAM_INT));

        $this->con->executeQuery($query, $params);
    }

    /**
     * @param int $newValue
     * @return void
     */
    public function setNbNewsMax(int $newValue): void
    {
        $query = "UPDATE tParams SET value=:val WHERE param='nbNewsTotal'";
        $params = array('val' => array($newValue, PDO::PARAM_INT));

        $this->con->executeQuery($query, $params);
    }
}