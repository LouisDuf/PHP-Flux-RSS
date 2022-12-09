<?php

namespace modele;

use config\Cleaner;

class AdminModel
{
    public function __construct(){}

    public function isAdmin(){
        if(isset($_SESSION['role'])){
            $role = $_SESSION['role'];
        }
        else return null;

        if(isset($_SESSION['login'])){
            $login = $_SESSION['login'];
        }
        else return null;


        $login = Cleaner::NettoyageLOGIN($login);

        if(isset($role)&&isset($login)&&$role=='admin'){
            return new Admin($role, $login);
        }
        else {return null;}
    }

    public function connecter($login, $mdp){
        $login = Cleaner::NettoyageLOGIN($login);
        $mdp = Cleaner::NettoyageLOGIN($mdp);
        //$mdp = md5($mdp);

        $dal = new AdminGateway();
        $result = $dal->authentifier($login, $mdp);

        if($result == 1){
            $_SESSION['role']='admin';
            $_SESSION['login']=$login;
            return true;
        }
        return false; // on peut retourner une instance d'objet
    }

    public function deconnecter(){
        unset($_SESSION);
        session_destroy();
    }
}