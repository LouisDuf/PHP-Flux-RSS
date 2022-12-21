<?php

namespace gateway;

use config\Connection;
use PDO;

class ParamsGateway
{
    private Connection $con;

    public function __construct(Connection $con) {
        $this->con = $con;
    }

    public function getNbNewsParPage() {
        $query = "SELECT * FROM tParams WHERE param='nbNewsParPage'";

        $this->con->executeQuery($query);

        return $this->con->getResults()[0]['value'];
    }

    public function setNbNewsParPage(int $newValue) {
        $query = "UPDATE tParams SET value=:val WHERE param='nbNewsParPage'";
        $params = array('val' => array($newValue, PDO::PARAM_INT));

        $this->con->executeQuery($query, $params);
    }

    public function getNbFluxParPage() {
        $query = "SELECT * FROM tParams WHERE param='nbFluxParPage'";

        $this->con->executeQuery($query);

        return $this->con->getResults()[0]['value'];
    }

    public function setNbFluxParPage(int $newValue) {
        $query = "UPDATE tParams SET value=:val WHERE param='nbFluxParPage'";
        $params = array('val' => array($newValue, PDO::PARAM_INT));

        $this->con->executeQuery($query, $params);
    }
}