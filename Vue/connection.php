<!DOCTYPE html>
<html>
    <head>
        <title>Connexion</title>
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
        <link rel=icon href="./imgs/Minecraft-logos.png"/>
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
                          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                            style="width: 185px;" alt="logo">
                          <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>
                        </div>

                        <form action="index.php?action=connexion" method="post">
                          <p>Please login to your account</p>

                          <div class="form-outline mb-4">
                            <input type="pseudo" id="form2Example11" class="form-control"
                              placeholder="Username" name="login"/>
                            <label class="form-label" for="form2Example11">Username</label>
                          </div>

                          <div class="form-outline mb-4">
                            <input type="password" id="form2Example22" class="form-control"
                              placeholder="password" name="password"/>
                            <label class="form-label" for="form2Example22">Password</label>
                          </div>

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
                        <h4 class="mb-4">We are more than just a company</h4>
                        <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                          exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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