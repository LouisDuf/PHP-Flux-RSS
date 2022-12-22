<?php
/**
 * Created by PhpStorm.
 * User: LouisDuf
 * Date: 05/12/2022
 * Time: 22:36
 */

namespace Controleur;

use Exception;
use Metier\Flux;
use Models\Model;
use Models\AdminModel;
use Config\Validation;
use Config\Cleaner;
use Models\Updater;
use PDOException;

class adminControler{

    private Model $Model;
    private AdminModel $admin;
    
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
                case 'afficherFlux':
                    $this->afficherFlux();
                    break;
                case 'pageAjoutFlux':
                    $this->afficherFormulaireFlux();
                    break;
                case 'supprimerFlux':
                    $this->supprimerFlux();
                    break;
                case 'ajouterFlux':
                    $this->ajouterFlux();
                    break;
                case 'pageParams':
                    $this->afficherPageParams(null);
                    break;
                case 'setNewsParPage':
                    $this->setNewsParPage();
                    break;
                case 'setFluxParPage':
                    $this->setFluxParPage();
                    break;
                case 'setNewsMax':
                    $this->setNewsMax();
                    break;
                case 'updateData':
                    $this->updateData();
                    break;
                default:
                    echo 'Ce message ne devrait jamais être vu';
                    break;
            }
        } catch (PDOException|Exception $e) {
            global $rep, $vues;
            $tab_erreur[] = "Erreur : ".$e->getMessage();
            require($rep.$vues["erreur"]);
        }
    }

    private function deconnexion(): void
    {
        $this->admin->deconnecter();
        header("Location: .");
    }

    private function afficherFlux(): void
    {
        global $rep, $vues;
        $model = new Model();

        $page = Cleaner::NettoyageInt(abs($_REQUEST['page']??1));
        if ($page == 0) {
            $page = 1;
        }

        $nbFluxByPage=$model->getNbFluxParPage();
        $tabFlux = $model->getFluxByPage($page, $nbFluxByPage);

        $fluxTot = $model->getNbFlux();
        $pageMax=ceil($fluxTot/$nbFluxByPage);

        require ($rep.$vues['flux']);
    }

    private function afficherFormulaireFlux(): void
    {
        global $rep, $vues;
        require($rep.$vues['formulaireFlux']);
    }

    private function supprimerFlux(): void
    {
        $model = new Model();
        $id = $_REQUEST['idFlux']??null;
        if ($id != null) {
            $id = Cleaner::NettoyageInt($id);
            $model->supprimerFlux($id);
        }
        $this->afficherFlux();
    }

    private function ajouterFlux(): void
    {
        $model = new Model();

        $title = Cleaner::NettoyageStr($_POST['title'])??null;
        $path = Cleaner::NettoyageStr($_POST['path'])??null;
        $link = Cleaner::NettoyageURL($_POST['link'])??null;
        $desc = Cleaner::NettoyageStr($_POST['description'])??null;

        $flux = new Flux(-1, $title, $path, $link, $desc);

        $model->addFlux($flux);

        $this->afficherFlux();
    }
    
    private function afficherPageParams($msg): void
    {
        global $rep, $vues;

        $model = new Model();
        $nbNewsParPage = $model->getNbNewsParPage();
        $nbFluxParPage = $model->getNbFluxParPage();
        $nbNewsMax = $model->getNbNewsMax();
        if ($msg != null) {
            $message=$msg;
        }

        require($rep.$vues['params']);
    }

    private function setNewsParPage(): void
    {
        $msg=null;
        $model = new Model();
        $old_value = $model->getNbNewsParPage();
        $new_value = Cleaner::NettoyageInt($_POST['nbNewsParPage'])??$old_value;
        if ($new_value < 0 || !Validation::val_int($new_value)) {
            $new_value = $old_value;
            $msg="Valeur de paramètre invalide !";
        }
        $model->setNbNewsParPage($new_value);
        $this->afficherPageParams($msg);
    }

    private function setFluxParPage(): void
    {
        $msg=null;
        $model = new Model();
        $old_value = $model->getNbFluxParPage();
        $new_value = Cleaner::NettoyageInt($_POST['nbFluxParPage'])??$old_value;
        if ($new_value < 0 || !Validation::val_int($new_value)) {
            $new_value = $old_value;
            $msg = "Valeur de paramètre invalide !";
        }
        $model->setNbFluxParPage($new_value);
        $this->afficherPageParams($msg);
    }

    private function setNewsMax(): void
    {
        $msg=null;
        $model = new Model();
        $old_value = $model->getNbNewsMax();
        $new_value = Cleaner::NettoyageInt($_POST['nbNewsMax'])??$old_value;
        if ($new_value < 0 || !Validation::val_int($new_value)) {
            $new_value = $old_value;
            $msg = "Valeur de paramètre invalide !";
        }
        $model->setNbNewsMax($new_value);
        if ($new_value<$old_value) {
            $model->faireLeMenageDansLesNews();
        }
        $this->afficherPageParams($msg);
    }

    function updateData(): void
    {
        $update = new Updater();
        $this->afficherFlux();
    }
}