<html>
    <!--TO DO-->
    <head>
        <title>Liste - Flux</title>

    </head>
    <body>
        <?php
        require("navbar.php")
        ?>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Chemin</th>
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
                            echo '<th scope="row">'.$flux->getId().'</th>';
                            echo "<td>".$flux->getTitle()."</td>";
                            echo "<td>".$flux->getPath()."</td>";
                            echo "<td>".$flux->getLink()."</td>";
                            echo "<td>".$flux->getDescription()."</td>";
                            echo "<td><button>Supprimer</button></td>";
                            echo '</tr>';
                        }
                    }
                ?>
                </tbody>
            </table>
            <?php
                if (isset($tabFlux)) {
                    foreach ($tabFlux as $flux) {
                        echo "<p>".$flux->getTitle()."</p>";
                        echo "</br>";
                    }
                }
            ?>
        </div>
        <div>
            <?php

            ?>
        </div>
    </body>
</html>
