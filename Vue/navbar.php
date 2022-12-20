<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Font Awesome -->
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
            rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
            rel="stylesheet"
    />
    <!-- MDB -->
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css"
            rel="stylesheet"
    />
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container">
            <!-- Navbar brand -->
            <a class="navbar-brand me-2">
                Projet PHP
            </a>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarButtonsExample">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=afficherFlux">Gestion des Flux</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=pageParams">Gestion des paramètres</a>
                    </li>
                </ul>
                <!-- Left links -->

                <div class="d-flex align-items-center">
                    <?php
                        if (isset($_SESSION['role'])) {
                            echo '<a href="index.php?action=deconnexion">
                                        <button type="button" class="btn btn-link px-3 me-2">
                                            Deconnexion
                                        </button>
                                  </a>';
                        }
                        else {
                            echo '<a href="index.php?action=pageConnexion">
                                        <button type="button" class="btn btn-primary me-3">
                                            Connexion
                                        </button>
                                  </a>';
                        }
                    ?>

                </div>
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
</body>
</html>