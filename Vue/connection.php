<!DOCTYPE html>
<html>
    <head>
        <title>Connexion</title>
        <link rel=icon href=" https://cdn-icons-png.flaticon.com/512/7860/7860934.png"/>
        <meta charset="utf-8" />
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
        <link rel="stylesheet" type="text/css" href="Vue/styleCon.css">
        <link rel=icon href="imgs/Minecraft-logos.png"/>
    </head>
    <body>
        <section class="h-100 gradient-form" style="background-color: #eee;">
          <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                  <div class="row g-0">
                    <div class="col-lg-6">
                      <div class="card-body p-md-5 mx-md-4">

                        <div class="text-center">
                          <img src="https://logcabinkits.co.uk/_images/blog/cats/news.png"
                            style="width: 185px;" alt="logo">
                          <h4 class="mt-1 mb-4 mt-2 pb-1">La référence des News</h4>
                        </div>

                        <form action="index.php?action=connexion" method="post">
                          <p>Please login to your account</p>

                          <input type="pseudo" class="form-control mb-2" placeholder="Username" name="login"/>

                          <input type="password" class="form-control mb-4" placeholder="password" name="password"/>

                          <div>
                              <input type="submit" value="connexion">
                          </div>

                            <?php
                            if(isset($message)) {
                                echo '<p>'.$message.'</p>';
                            }
                            ?>
                            
                        </form>

                      </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                      <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                        <h4 class="mb-4">RfNews</h4>
                        <p class="mb-0">À partir de ce portail, vous pourrez accéder aux flux. Cela vous permettra de maintenir et de mettre à jour le site des news pour les utilisateurs du site.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    </body>
</html>