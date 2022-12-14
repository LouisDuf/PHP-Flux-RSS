<html>
    <!--TO DO-->
    <head>

    </head>
    <body>
        <?php
            if (isset($tabFlux)) {
                foreach ($tabFlux as $flux) {
                    echo "<p>".$flux->getTitle()."</p>";
                    echo "</br>";
                }
            }
        ?>
        <div>
            <?php

            ?>
        </div>
    </body>
</html>
