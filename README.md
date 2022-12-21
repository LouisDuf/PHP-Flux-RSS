# ProjetPHP

Ce projet a été réalisé durant le cours de PHP de 2ème année de BUT à l'IUT Clermont Auvergne.  

## Répartition du travail

### Rémi Regnault

Classe(s) métier(s) :
* News

Classe(s) gateway(s) :
* NewsGateway
* ParamsGateway
* FluxGateway (légères corrections)

Classe(s) controlleur(s) :
* UserControler
* FrontControler (grosses corrections)
* AdminControler (grosses corrections)

Classe(s) modèle(s) :
* NewsModel
* FluxModel
* Ajout de FluxGateway dans Model

Vue(s) :
* listeNews (légères corrections)
* erreur
* listeFlux
* navbar
* gestionParametres
* formulaireFlux

Config :
* Cleaner (modifications)
* Validation (modifications)

Autre(s) :
* Modification des tables SQL
* Insertion des flux rss
* Faire en sorte que l'autoloader fonctionne

### Louis Dufour
Classe(s) métier(s) :
* Flux
* Admin

Classe(s) gateway(s) :
* FluxGateway
* AdminGateway

Classe(s) controlleur(s) :
* FrontControler
* AdminControler

Classe(s) modèle(s) :
* AdminModel
* Fusion FluxModel et NewsModel dans Model

Vue(s) :
* listeNews
* connection

Config :
* Cleaner
* Validation

Autre(s) :
* Parseur XML
* Tables SQL