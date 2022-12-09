<?php
/**
 * Created by PhpStorm.
 * User: LouisDuf
 * Date: 05/12/2022
 * Time: 22:36
 */

namespace controleur;

use Modele\Flux;
use config\Validation;
use config\cleaner;

class adminControl{

    private $fluxModele;
    private $admin;
    
    public function __construct(){
        global $path;
        
        $this->fluxModele = new FluxModele();
        $this->admin = new AdminModele();

        
        $action = (isset($_REQUEST['action'])?$_REQUEST['action']:null);
        $a=$this->admin->isAdmin();

        if($a == null){
            switch($action){
                case 'pageConnexion':
                    $this->AfficherPageConnexion();
                    break;
                case 'connexion':
                    $this->connexion();
                    break;
                case 'deconnexion':
                    $this->deconnexion();
                    break;
                default:
                    header("Location: .?action=pageConnexion");
            }
        }
        else{
            switch($action){
                case 'pageConnexion':
                case 'connexion':
                    header("Location: .");
                    break;
                case 'supprimerFlux':
                    $this->supprimerFlux();
                    break;
                case 'deconnexion':
                    $this->deconnexion();
                    break;
                case 'ajouterFlux':
                    $this->ajouterFlux();
                    break;
                case 'setNbAffiche':
                    $this->setNbAffiche();
                    break;
            }
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
        $fluxs = $this->Flux->getPageFlux(1);
        $adminco = $this->admin->isAdmin();
        
        echo $template->render(array(
            'Fluxs' => $fluxs,
            'msg' => cleaner::NettoyageLOGIN($_REQUEST['msg']),
            'Admin' => $adminco
        ));
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