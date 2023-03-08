<?php //Lien protégé par l'authentification
require_once __DIR__ . '/../../back/controller/securiteController.php';
require_once __DIR__ . '/../../back/controller/inscriptionController.php';
require_auth(1);
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


<div class="container">


    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Cree un compte</h4>

            <form action="/inscription/consultant" method="post">
            <input name="role" value="2" style="display: none;" class="form-control" placeholder="Nom complet" type="text">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="nom" class="form-control" placeholder="Nom complet" type="text">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="prenom" class="form-control" placeholder="prenom complet" type="text">
                </div>
                <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email" class="form-control" placeholder="addresse Email" type="email">
                </div>
                <!-- form-group// -->

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="password" class="form-control" placeholder="Cree un Mot de passe" type="password">
                </div>
                <!-- form-group// -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Cree le compte </button>
                </div>
                <!-- form-group// -->
                <p class="text-center">Have an account? <a href="">Log In</a> </p>
            </form>
        </article>
    </div>
    <!-- card.// -->

</div>