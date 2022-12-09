<?php

namespace modele;

use config\Connection;

class FluxModel
{
    private  $flux_g;

    public function __construct() {
        global $base, $login, $mdp;
        $this->flux_g = new FluxGateway(new Connection($base, $login, $mdp));
    }

    public function getFluxById($id) {
        return $this->flux_g->getFluxById($id);
    }

    public function addFlux($flux){
        $this->flux_g->add($flux);
    }

    public function supprimer($idFlux){
        $this->flux_g->supprimer($idFlux);
    }
}