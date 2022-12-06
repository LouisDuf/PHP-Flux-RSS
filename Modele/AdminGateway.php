<?php

namespace modele;

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
    public function authentifier($admin, $pass){
        $bd = BD::getInstance();
        $params = array(
            '1' => array($admin, PDO::PARAM_STR),
            '2' => array($pass, PDO::PARAM_STR)
        );
        $result = $bd->lecture("SELECT COUNT(*) AS nb FROM tAdmin WHERE login = ? AND mdp = ?", $params);
        return $result[0]['nb'];
    }
}