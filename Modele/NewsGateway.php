<?php

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

        public function Add(News $n)
        {
            $querry = "INSERT INTO News(flux, titre, description, url, guid, date) VALUES (:flux, :titre, :descirpion, :url, :guid, :date)";
            $params = array("flux" => array($n->getFlux(), PDO::PARAM_STR),
                            "titre" => array($n->getTitre(), PDO::PARAM_STR),
                            "description" => array($n->getDescription(), PDO::PARAM_STR),
                            "url" => array($n->getUrl(), PDO::PARAM_STR),
                            "guid" => array($n->getGuid(), PDO::PARAM_STR),
                            "date" => array($n->getDate(), PDO::PARAM_STR),
            );
            $this->co->executeQuery($querry, $params);
        }

        public function GetNewsById(int $id) : News
        {
            $querry = "SELECT * FROM News WHERE id=:id";
            $params = array("id" => array($id, PDO::PARAM_INT));
            $this->co->executeQuery($querry, $params);

            $results = $this->co->getResults();

            return new News($results[0][0], $results[0][1], $results[0][2], $results[0][3], $results[0][4], $results[0][5], $results[0][6]);
        }
    }