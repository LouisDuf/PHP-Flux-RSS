<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Liste - News</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="Vue/styleLNews.css"/>
        <link rel="slyesheet" type="text/css" href="Vue/bootstrap/css/bootstrap.css"/>
        <link rel=icon href="./imgs/Minecraft-logos.png"/>
    </head>
    <body>
        <div class="navBar">
            <h1>Notre site web</h1>
            <a href="index.php?action=pageConnexion"><button>Connexion</button></a>
            <a href="index.php?action=deconnexion"><button>Deconnexion</button></a>
            <a href="index.php?action=afficherFlux">Gestion des flux</a>
        </div>
        <?php
        require("navbar.php")
        ?>
        
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row">
                    <div class="col-sm-6">
                    
                        <div class="list list-row block">
                            <div class="list-item" data-id="19">
                                <?php
                                    // on v�rifie les donn�es provenant du mod�le
                                    if (isset($tabNews))
                                    {
                                        foreach ($tabNews as &$News) {
                                            echo '<a href="'.$News->getUrl().'" data-abc="true">';
                                        } 
                                    } 
                                    else
                                    {
                                        require($rep.$vues['erreur']); //TO DO fix
                                    }
                                ?>                               
                                    <div><a href="#" data-abc="true"><span class="w-48 avatar gd-warning">S</span></a></div>
                                    <div class="flex">
                                        <a href="#" class="item-author text-color" data-abc="true"> 
                                            <?php
                                                // on v�rifie les donn�es provenant du mod�le
                                                if (isset($tabNews))
                                                {
                                                    foreach ($tabNews as &$News) {
                                                        echo "<p>".$News->getTitle()."<p>";
                                                    } 
                                                } 
                                                else
                                                {
                                                    require($rep.$vues['erreur']);
                                                }
                                            ?>
                                        </a>
                                        <div class="item-except text-muted text-sm h-1x">
                                            <?php
                                                // on v�rifie les donn�es provenant du mod�le
                                                if (isset($tabNews))
                                                {
                                                    foreach ($tabNews as &$News) {
                                                        echo "<p>".$News->getDescription()."<p>";
                                                    } 
                                                } 
                                                else
                                                {
                                                    require($rep.$vues['erreur']);
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="no-wrap">
                                        <div class="item-date text-muted text-sm d-none d-md-block">
                                            <?php
                                                // on v�rifie les donn�es provenant du mod�le
                                                if (isset($tabNews))
                                                {
                                                    foreach ($tabNews as &$News) {
                                                        echo "<p>".$News->getDate()->format('Y-m-d')."<p>";
                                                    }
                                                } 
                                                else
                                                {
                                                    require($rep.$vues['erreur']);
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>