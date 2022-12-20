<?php

namespace modele;


class FluxModel
{
    /**
     * @var FluxGateway
     */
    private  $flux_g;

    /**
     * Constructeur de Flux
     */
    public function __construct() {
        global $base, $login, $mdp;
        $this->flux_g = new FluxGateway(new \config\Connection($base, $login, $mdp));
    }

    /**
     * @param $id
     * @return Flux
     */
    public function getFluxById($id) {
        return $this->flux_g->getFluxById($id);
    }

    /**
     * @param $flux
     * @return void
     */
    public function addFlux($flux){
        $this->flux_g->add($flux);
    }

    /**
     * @param $idFlux
     * @return void
     */
    public function supprimer($idFlux){
        $this->flux_g->supprimer($idFlux);
    }

    public function getAllFlux() {
        $liste = $this->flux_g->getAll();

        return $liste;
    }
}