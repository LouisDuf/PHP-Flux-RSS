<html>
    <head>
        <title>Formulaire d'ajout de flux</title>
    </head>
    <body>
        <?php
            require("navbar.php")
        ?>
        <form action="index.php?action=ajouterFlux" method="post">
            <input type="text" class="form-control" placeholder="Titre" name="title" required="required"/>

            <input type="text" class="form-control" placeholder="Chemin" name="path" required="required"/>

            <input type="text" class="form-control" placeholder="Lien" name="link" required="required"/>

            <textarea class="form-control" rows="4" placeholder="Description" name="description" required="required"></textarea>

            <input type="text" class="form-control" placeholder="URL de l'image" name="image-url"/>

            <input type="text" class="form-control" placeholder="Titre de l'image" name="image-title"/>

            <input type="text" class="form-control" placeholder="Lien de l'image" name="image-link"/>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Valider l'ajout</button>
        </form>
    </body>
</html>
