<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Liste - News</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="Vue/styleLNews.css"/>
        <link rel=icon href="./imgs/Minecraft-logos.png"/>
    </head>
    <body>
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
        <!-- Gestion des pages -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php
                if (isset($page) && isset($pageMax)) {
                    if ($page>1) {
                        echo '<li class="page-item">';
                        echo '<a class="page-link" href="index.php?page=1">First</a>';
                    }
                    else {
                        echo '<li class="page-item disabled">';
                        echo '<a class="page-link">First</a>';
                    }
                    echo '</li>';

                    if ($page>1) {
                        $page_m1 = $page-1;
                        echo '<li class="page-item">';
                        echo '<a class="page-link" href="index.php?page='.$page_m1.'">Previous</a>';
                    }
                    else {
                        echo '<li class="page-item disabled">';
                        echo '<a class="page-link">Previous</a>';
                    }
                    echo '</li>';


                    echo '<li class="page-item active" aria-current="page">';
                    echo '<a class="page-link" href="index.php?page='.$page.'">'.$page.'<span class="visually-hidden">(current)</span></a>';
                    echo '</li>';

                    if ($page<$pageMax) {
                        $page_p1=$page+1;
                        echo '<li class="page-item">';
                        echo '<a class="page-link" href="index.php?page='.$page_p1.'">Next</a>';
                    }
                    else {
                        echo '<li class="page-item disabled">';
                        echo '<a class="page-link">Next</a>';
                    }
                    echo '</li>';

                    if ($page<$pageMax) {
                        echo '<li class="page-item">';
                        echo '<a class="page-link" href="index.php?page='.$pageMax.'">Last</a>';
                    }
                    else {
                        echo '<li class="page-item disabled">';
                        echo '<a class="page-link">Last</a>';
                    }
                    echo '</li>';
                }
                ?>
            </ul>
        </nav>
    </body>
</html>