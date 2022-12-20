<html>
    <head>
        <title>Formulaire d'ajout de flux</title>
    </head>
    <body>
        <?php
            require("navbar.php")
        ?>
        <form action="index.php?action=ajouterFlux" method="post">
            <!-- Text input -->
            <div class="form-outline mb-4">
                <input type="text" id="title" class="form-control" required="required" name="title"/>
                <label class="form-label" for="title">Titre</label>
            </div>

            <!-- Text input -->
            <div class="form-outline mb-4">
                <input type="text" id="path" class="form-control" required="required" name="path"/>
                <label class="form-label" for="path">Chemin</label>
            </div>

            <!-- Text input -->
            <div class="form-outline mb-4">
                <input type="text" id="link" class="form-control" required="required" name="link"/>
                <label class="form-label" for="link">Lien</label>
            </div>

            <!-- Message input -->
            <div class="form-outline mb-4">
                <textarea class="form-control" id="description" rows="4" required="required" name="description"></textarea>
                <label class="form-label" for="description">Description</label>
            </div>

            <!-- Text input -->
            <div class="form-outline mb-4">
                <input type="text" id="image-url" class="form-control" name="image-url"/>
                <label class="form-label" for="image-url">Image URL</label>
            </div>

            <!-- Text input -->
            <div class="form-outline mb-4">
                <input type="text" id="image-title" class="form-control" name="image-title"/>
                <label class="form-label" for="image-title">Image Titre</label>
            </div>

            <!-- Text input -->
            <div class="form-outline mb-4">
                <input type="text" id="image-link" class="form-control" name="image-link"/>
                <label class="form-label" for="image-link">Image Lien</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Valider l'ajout</button>
        </form>
    </body>
</html>
