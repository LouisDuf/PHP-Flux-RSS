<?php
/**
 * Created by PhpStorm.
 * User: LouisDuf
 * Date: 05/12/2022
 * Time: 22:36
 */

namespace controleur;

use modele\Flux;
use modele\FluxModel;
use modele\AdminModel;
use config\Validation;
use config\Cleaner;

class adminControler{

    private $fluxModele;
    private $admin;
    
    public function __construct(){
        global $path;
        
        //$this->fluxModele = new FluxModel();
        $this->admin = new AdminModel();

        if (isset($_REQUEST['action'])) {
            $action = Cleaner::NettoyageStr($_REQUEST['action']);
        }
        else {
            $action = null;
        }

        $a=$this->admin->isAdmin();

        try {
            switch($action) {
                case null:
                    echo 'Ce message ne devrait jamais être vu';
                    break;
                case 'deconnexion':
                    $this->deconnexion();
                    break;
                case 'ajouterFlux':
                    $this->ajouterFlux();
                    break;
                case 'supprimerFlux':
                    $this->supprimerFlux();
                    break;
                case 'afficherFlux':
                    $this->afficherFlux();
                    break;
                case 'pageAjoutFlux':
                    $this->afficherFormulaireFlux();
                    break;
            }
        } catch (\Exception $e) {
            global $rep, $vues;
            $tab_erreur[] = "Erreur : ".$e->getMessage();
            require($rep.$vues["erreur"]);
        }
    }

    private function afficherFlux() {
        global $rep, $vues;
        $model = new FluxModel();
        $tabFlux = $model->getAllFlux();

        require ($rep.$vues['flux']);
    }
    
    private function deconnexion(){
        $this->admin->deconnecter();
        header("Location: .");
    }

    private function afficherFormulaireFlux() {
        global $rep, $vues;
        require($rep.$vues['formulaireFlux']);
    }

    private function ajouterFlux()
    {
        $model = new FluxModel();

        $title = Cleaner::NettoyageStr($_POST['title'])??null;
        $path = Cleaner::NettoyageStr($_POST['path'])??null;
        $link = Cleaner::NettoyageURL($_POST['link'])??null;
        $desc = Cleaner::NettoyageStr($_POST['description'])??null;
        $imUrl = Cleaner::NettoyageURL($_POST['image-url'])??"";
        $imTitle = CLeaner::NettoyageStr($_POST['image-title'])??"";
        $imLink = Cleaner::NettoyageURL($_POST['image-link'])??"";

        $flux = new Flux(-1, $title, $path, $link, $desc, $imUrl, $imTitle, $imLink);

        $model->addFlux($flux);

        $this->afficherFlux();
    }

    private function supprimerFlux()
    {
        $model = new FluxModel();
        $id = $_REQUEST['idFlux']??null;
        if ($id != null) {
            $id = Cleaner::NettoyageInt($id);
            $model->supprimer($id);
        }
        $this->afficherFlux();
    }
}