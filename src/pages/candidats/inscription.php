<!DOCTYPE html>
<html lang="en">

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

                    <h1 class="text-white mb-4">Completer le profile (page candidat)</h1>
                    <form action="/inscriptionController" method="post">
                        <input type="text" name="role" value="4" hidden >
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body">
                            <input type="text" name="isCandidat" value="true" hidden class="form-control form-control-lg" />
                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Nom</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input type="text" name="nom" class="form-control form-control-lg" />

                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Prenom</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input type="text" name="prenom" class="form-control form-control-lg" />

                                    </div>
                                </div>

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Email</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input type="text" name="email" class="form-control form-control-lg" />

                                    </div>
                                </div>

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Mot de passe</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input type="password" name="password" class="form-control form-control-lg" />

                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Inserer votre CV</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input class="form-control form-control-lg" accept="application/pdf" id="formFileLg" type="file" name="cv" />
                                        <div class="small text-muted mt-2">Inserer votre CV/ taille du fichier max est de 50 MB</div>

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