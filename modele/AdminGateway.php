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

    /**
     * @param $login
     * @return mixed
     */
    public function getPassword($login){
        $querry = "SELECT * FROM tAdmin WHERE login=:login";
        $params = array(':login' => array($login, \PDO::PARAM_STR));

        $this->co->executeQuery($querry, $params);

        $results = $this->co->getResults();
        var_dump($results);
        if (count($results) == 0) {
            return null;
        }
        return $results[0]['mdp'];
    }
}