<html>
    <head>
        <title>Liste - News</title>

    </head>
    <body>
        <?php
        require("navbar.php")
        ?>
        <div class="page-content page-container" id="page-content">
            <div class="d-flex justify-content-end">
                <a href="index.php?action=pageAjoutFlux">
                <button type="button" class="btn btn-primary">
                    Ajouter News
                </button>
                </a>
            </div>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">News</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Url</th>
                            <th scope="col">Guid</th>
                            <th scope="col">Description</th>
                            <th scope="col">DatePub</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (isset($tabNews)) {
                            foreach ($tabNews as $news) {
                                echo '<tr class="table-active">';
                                echo '<th scope="row">'.$news->getId().'</th>';
                                echo "<td>".$news->getTitle()."</td>";
                                echo "<td>".$news->getUrl()."</td>";
                                echo "<td>".$news->getGuid()."</td>";
                                echo "<td>".$news->getDescription()."</td>";
                                echo '<td>'.$news->getDate()->format('Y-m-d H:i:s').'</td>';
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
