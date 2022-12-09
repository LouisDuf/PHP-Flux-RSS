<?php

namespace modele;

use config\Connection;

class AdminGateway
{

    private Connection $co;

    /**
     * @param $co
     */
    public function __construct(Connection $co)
    {
        $this->co = $co;
    }
    public function getPassword($login){
        $querry = "SELECT * FROM tadmin WHERE login = :login";
        $params = array("login" => array($login, PDO::PARAM_STR));

        $this->co->executeQuery($querry, $params);

        return $this->co->getResults()[0]["mdp"];
    }
}