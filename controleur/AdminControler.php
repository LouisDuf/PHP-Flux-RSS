<?php
/**
 * Created by PhpStorm.
 * User: LouisDuf
 * Date: 05/12/2022
 * Time: 22:36
 */

namespace controleur;

use modele\FluxModel;
use modele\AdminModel;
use config\Validation;
use config\Cleaner;

class adminControl{

    private $fluxModele;
    private $admin;
    
    public function __construct(){
        global $path;
        
        $this->fluxModele = new FluxModel();
        $this->admin = new AdminModel();

        if (isset($_REQUEST['action'])) {
            $action = Validation::val_action($_REQUEST['action']);
        }
        else {
            $action = null;
        }

        $a=$this->admin->isAdmin();

        try {
            switch($action) {
                case null:
                    
            }
        } catch (\Exception $e) {
            global $rep, $vues;
            $tab_erreur[] = "Erreur : ".$e->getMessage();
            require($rep.$vues["erreur"]);
        }
    }

    private function addFlux()
    {
        Validation::existe($_REQUEST['link']);
        Validation::URLValid($_REQUEST['link']);

        $link = $_REQUEST['valid'];

        $fluxMod = new FluxModele();
        $fluxMod->ajouterFlux($link);
    }

    private function AfficherPageConnexion(){

    }

    private function connexion(){
        $resultat = $this->admin->connecter($_POST['login'],$_POST['mdp']);
        if($resultat){
            header("Location: .");
        }
        else{
            header("Location: .?action=pageConnexion&msg=Identifiants Inconnus");
        }
    }
    
    private function deconnexion(){
        $this->admin->deconnecter();
        header("Location: .");
    }

    private function ajouterFlux()
    {
        $lien = $_REQUEST['url'];
        $this->Flux->ajouterFlux($lien);
        header("Location: .?action=afficherFlux");
    }

    private function supprimerFlux()
    {
        $id = $_REQUEST['id'];
        Validation::existe($id);
        Validation::isNumber($id);
        $this->Flux->supprimerFlux($id);
        header("Location: .?action=afficherFlux");
    }
}