<!DOCTYPE html>
    <html lang="en">

<?php 
require_once __DIR__ . '/../../back/controller/securiteController.php';
require_auth(3);
?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body>
        <section class="vh-100" style="background-color: #2779e2;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-9">
                        <h1 class="text-white mb-4">Publier une annonce</h1>
                        <form action="/recruteurController" method="post">

                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body">

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">

                                            <h6 class="mb-0">lieu de travail</h6>

                                        </div>

                                        <div class="col-md-9 pe-5">

                                            <input type="text" name="lieutravail" class="form-control form-control-lg" />

                                        </div>

                                    </div>
                                    <hr class="mx-n3">

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">

                                            <h6 class="mb-0">intitule</h6>

                                        </div>

                                        <div class="col-md-9 pe-5">

                                            <input type="text" name="intitule" class="form-control form-control-lg" />

                                        </div>

                                    </div>

                                    <hr class="mx-n3">

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">

                                            <h6 class="mb-0">horaires</h6>

                                        </div>

                                        <div class="col-md-9 pe-5">

                                            <input type="text" name="horaires" class="form-control form-control-lg" />

                                        </div>

                                    </div>

                                    <hr class="mx-n3">

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">

                                            <h6 class="mb-0">salaire</h6>

                                        </div>

                                        <div class="col-md-9 pe-5">

                                            <input type="number" name="salaire" class="form-control form-control-lg" />

                                        </div>

                                    </div>

                                    
                                    <hr class="mx-n3">

                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">

                                            <h6 class="mb-0">description détaillée</h6>

                                        </div>

                                        <div class="col-md-9 pe-5">

                                            <textarea name="descriptif" class="form-control" rows="3" placeholder="inserer la description detaillée"></textarea>

                                        </div>

                                    </div>


                                </div>

                                <hr class="mx-n3">

                                <div class="px-5 py-4">
                                    <button type="submit" class="btn btn-primary btn-lg">Envoyer</button>
                                </div>

                            </div>
                    </div>
                    </form>
                </div>
            </div>
            </div>
        </section>
    </body>

    </html>