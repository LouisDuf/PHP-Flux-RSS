<!DOCTYPE html>
<html>
    <body>
        <h1>Erreur :</h1>
        <?php
            if (isset($tab_erreur)) {
                foreach ($tab_erreur as $err) {
                    echo $err."</br>";
                }
            }
        ?>
    </body>
</html>
