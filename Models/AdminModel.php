<?php

namespace Models;

use Config\Cleaner;
use Config\Connection;
use Gateway\AdminGateway;
use Metier\Admin;


class AdminModel
{
    /**
     * Constructeur Admin
     */
    public function __construct(){}

    /**
     * Vérifie si nous avons bien a faire un admin
     * @return Admin|null
     */
    public function isAdmin(): ?Admin
    {
        if (isset($_SESSION['role']) && isset($_SESSION['login'])) {
            $role = Cleaner::NettoyageStr($_SESSION['role']);
            $login = Cleaner::NettoyageStr($_SESSION['login']);
            if ($role = "admin") {
                return new Admin($login);
            }
        }
        return null;
    }

    /**
     * @param string $login
     * @param string $mdp
     * @return Admin|null
     */
    public function connecter(string $loginUser, string $password): ?Admin
    {
        global $base, $login, $mdp;
        $adm_gw = new AdminGateway(new Connection($base, $login, $mdp));

        $mdpBD = $adm_gw->getPassword($loginUser);
        if ($mdpBD==null) {
            $mdpBD = '';
        }

        if(password_verify($password, $mdpBD)){
            $_SESSION['role']='admin';
            $_SESSION['login']=$loginUser;
            return new Admin($loginUser);
        }
        return null;
    }

    public function deconnecter(): void
    {
        unset($_SESSION);
        session_destroy();
    }
}