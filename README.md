# ProjetPHP

Ce projet a été réalisé durant le cours de PHP de 2ème année de BUT à l'IUT Clermont Auvergne.  
## Utilisation 
Explorer le monde
Lecteur fluxs RSS

Dévellopeurs :
Louis Dufour : Louis.Dufour@etu.uca.fr
Rémi Regnault : Rémi.Regnault@etu.uca.fr
IUT Informatique - Clermont-Ferrand, FRANCE

Utilisation :
1 - Charger le fichier "TableProject.sql".
2 - Définir le nom, le serveur et les identifiants de la base de donnée dans le fichier "Config/config.php".
3 - Placer le site dans le répertoire de votre serveur WEB (Apache, nginx,..) .
4 - Vous pouvez vous connecter en utilisant le button connexion.
Les identifiants sont :
user :      admin0
password:   mdp
Pour l'instant, le changement du mot de passe s'éffectue dans la base de donnée dans la table `tadmin`.
Le mot de passe est crypté en utilisant la méthode md5.
Vous pouvez convertir votre mot de passe en utilisant le script "md5.php".

Mise à jour des Fluxs:

    La mise à jour peut être éffectué :
        - Depuis le site en étant connecté par le bouton "Rafraichir base" se trouvant dans la barre de menu à gauche
        - En executant le fichier "refreshRSSContent.php".
    Il est possible d'appeler le fihier "refreshRSSContent.php" depuis une tâche CRON et donc d'automatiser la mise à
     jour.


## Répartition du travail

### Rémi Regnault
* Classe(s) métier(s) :
  * News

* Classe(s) gateway(s) :
  * NewsGateway
  * ParamsGateway
  * FluxGateway (légères corrections)

* Classe(s) controlleur(s) :
  * UserControler
  * FrontControler (grosses corrections)
  * AdminControler (grosses corrections)

* Classe(s) modèle(s) :
  * NewsModel
  * FluxModel
  * Ajout de FluxGateway dans Model

* Vue(s) :
  * listeNews (légères corrections)
  * erreur
  * listeFlux
  * navbar
  * gestionParametres
  * formulaireFlux

* Config :
  * Cleaner (modifications)
  * Validation (modifications)

* Autre(s) :
  * Modification des tables SQL
  * Insertion des flux rss
  * Faire en sorte que l'autoloader fonctionne
  * Gestion de l'affichage en fonction du nombre de page

### Louis Dufour
* Classe(s) métier(s) :
  * Flux
  * Admin

* Classe(s) gateway(s) :
  * FluxGateway
  * AdminGateway

* Classe(s) controlleur(s) :
  * FrontControler
  * AdminControler

* Classe(s) modèle(s) :
  * AdminModel
  * Fusion FluxModel et NewsModel dans Model

* Vue(s) :
  * listeNews
  * connection

* Config :
  * Cleaner
  * Validation

* Autre(s) :
  * Parseur XML
  * Tables SQL