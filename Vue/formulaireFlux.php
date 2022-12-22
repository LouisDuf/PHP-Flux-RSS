<html>
    <head>
        <link rel=icon href=" https://cdn-icons-png.flaticon.com/512/7860/7860934.png"/>
        <title>Formulaire d'ajout de flux</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <?php
            require("navbar.php")
        ?>
        <h2 class="mb-4 mt-3">Penser à faire un rechargement de vos news une fois l'ajout de flux terminé</h2>
        <form action="index.php?action=ajouterFlux" method="post">
            <input type="text" class="form-control" placeholder="Titre" name="title" required="required"/>

            <input type="text" class="form-control" placeholder="Chemin" name="path" required="required"/>

            <input type="text" class="form-control" placeholder="Lien" name="link" required="required"/>

            <textarea class="form-control" rows="4" placeholder="Description" name="description" required="required"></textarea>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4 mt-5">Valider l'ajout</button>
        </form>
    </body>
</html>
