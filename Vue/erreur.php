<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel=icon href=" https://cdn-icons-png.flaticon.com/512/7860/7860934.png"/>
    </head>
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
