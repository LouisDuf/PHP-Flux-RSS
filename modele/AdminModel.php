<?php

namespace modele;

use config\Cleaner;

class AdminModel
{
    public function __construct(){}

    public function isAdmin(){
        if (isset($_SESSION['role']) && isset($_SESSION['login'])) {
            $role = Cleaner::NettoyageLOGIN($_SESSION['role']);
            $login = Cleaner::NettoyageLOGIN($_SESSION['login']);
            if ($role = "admin") {
                return new Admin($login);
            }
        }
        return null;
    }

    public function connecter(string $login, string $mdp){
        $login = Cleaner::NettoyageLOGIN($login);
        $mdp = Cleaner::NettoyageLOGIN($mdp);

        $adm_gw = new AdminGateway();
        $mdpBD = $adm_gw->getPassword($login);

        if(password_verify($mdp, $mdpBD)){
            $_SESSION['role']='admin';
            $_SESSION['login']=$login;
            return new Admin($login);
        }
        return null;
    }

    public function deconnecter(){
        unset($_SESSION);
        session_destroy();
    }
}