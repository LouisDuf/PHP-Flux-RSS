<html>
    <head>
        <link rel=icon href=" https://cdn-icons-png.flaticon.com/512/7860/7860934.png"/>
        <title>Liste - News</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <?php
        require("navbar.php")
        ?>
        <h2 class="mb-4 mt-3">Liste News :</h2>
        <div class="page-content page-container" id="page-content">

            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">DatePub</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (isset($tabNews)) {
                            foreach ($tabNews as $news) {
                                echo '<tr class="table-active">';
                                echo '<td>'.$news->getDate().'</td>';
                                echo '<td><a href="'.$news->getUrl().'" target="_blank">'.$news->getTitle().'</a></td>';
                                echo "<td>".$news->getDescription()."</td>";
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

        </div>
    </body>
</html>
