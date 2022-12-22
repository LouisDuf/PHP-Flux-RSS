<html>
    <head>
        <link rel=icon href=" https://cdn-icons-png.flaticon.com/512/7860/7860934.png"/>
        <title>Liste - Flux</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <?php
        require("navbar.php")
        ?>
        <div class="page-content page-container" id="page-content">
            <div class="d-flex justify-content-between align-items-center ">
                <h2 class="mb-4 mt-3">Liste Flux :</h2>
                <div>
                    <a href="index.php?action=pageAjoutFlux">
                    <button type="button" class="btn btn-primary">
                        Ajouter flux
                    </button>
                    </a>
                </div>
            </div>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <!--<th scope="col">#</th>-->
                            <th scope="col">Titre</th>
                            <!--<th scope="col">Chemin</th>-->
                            <th scope="col">Lien</th>
                            <th scope="col">Description</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (isset($tabFlux)) {
                            foreach ($tabFlux as $flux) {
                                echo '<tr class="table-active">';
                                //echo '<th scope="row">'.$flux->getId().'</th>';
                                echo "<td>".$flux->getTitle()."</td>";
                                //echo "<td>".$flux->getPath()."</td>";
                                echo "<td>".$flux->getLink()."</td>";
                                echo "<td>".$flux->getDescription()."</td>";
                                echo '<td><a href="index.php?action=supprimerFlux&idFlux='.$flux->getId().'"><button>Supprimer</button></a></td>';
                                echo '</tr>';
                            }
                        }
                    ?>
                    </tbody>
                </table>
            </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <?php
                        if (isset($page) && isset($pageMax)) {
                            if ($page>1) {
                                echo '<li class="page-item">';
                                echo '<a class="page-link" href="index.php?action=afficherFlux&page=1">First</a>';
                            }
                            else {
                                echo '<li class="page-item disabled">';
                                echo '<a class="page-link">First</a>';
                            }
                            echo '</li>';

                            if ($page>1) {
                                $page_m1 = $page-1;
                                echo '<li class="page-item">';
                                echo '<a class="page-link" href="index.php?action=afficherFlux&page='.$page_m1.'">Previous</a>';
                            }
                            else {
                                echo '<li class="page-item disabled">';
                                echo '<a class="page-link">Previous</a>';
                            }
                            echo '</li>';


                            echo '<li class="page-item active" aria-current="page">';
                            echo '<a class="page-link" href="index.php?action=afficherFlux&page='.$page.'">'.$page.'<span class="visually-hidden">(current)</span></a>';
                            echo '</li>';

                            if ($page<$pageMax) {
                                $page_p1=$page+1;
                                echo '<li class="page-item">';
                                echo '<a class="page-link" href="index.php?action=afficherFlux&page='.$page_p1.'">Next</a>';
                            }
                            else {
                                echo '<li class="page-item disabled">';
                                echo '<a class="page-link">Next</a>';
                            }
                            echo '</li>';

                            if ($page<$pageMax) {
                                echo '<li class="page-item">';
                                echo '<a class="page-link" href="index.php?action=afficherFlux&page='.$pageMax.'">Last</a>';
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
        </div>
    </body>
</html>
