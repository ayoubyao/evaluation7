<?php

require_once 'vendor/autoload.php';
require_once 'src/back/model/candidat.php';
require_once 'src/back/controller/recruteurController.php';
require_once 'src/back/controller/administrateurController.php';
require_once 'src/back/controller/consultantController.php';
require_once 'src/back/controller/AnnonceController.php';


$router = new AltoRouter();

// Configuration des routes
$router->map('GET', '/',  function() {
    require __DIR__ . '/src/pages/connexion.php';
});

//inscriptions
$router->map('GET', '/inscription',  function() {
    require __DIR__ . '/src/pages/inscription/inscription.php';
});

//inscription pour les recruteurs
$router->map('GET', '/inscription/recruteur',  function() {
    require __DIR__ . '/src/pages/recruteurs/inscription.php';
});

//inscription pour les candidats
$router->map('GET', '/inscription/candidat',  function() {
    require __DIR__ . '/src/pages/candidats/inscription.php';
});

//inscription pour les candidats
$router->map('POST', '/inscription/consultant',  function() {
    require __DIR__ . '/src/back/controller/inscriptionController.php';
});

//inscription pour les candidats
$router->map('GET', '/indexconsultant',  function() {
    require __DIR__ . '/src/pages/consultants/index.php';
});

//inscription pour les recruteurs
$router->map('GET', '/indexrecruteur',  function() {
    require __DIR__ . '/src/pages/recruteurs/index.php';
});

//inscription pour les candidats
$router->map('GET', '/indexcandidat',  function() {
    require __DIR__ . '/src/pages/candidats/index.php';
});

//inscription pour les candidats controlleur
$router->map('POST', '/inscriptionController',  function() {
    require __DIR__ . '/src/back/controller/inscriptionController.php';
});

//creation des annonces
$router->map('POST', '/recruteurController',  function() {
    require __DIR__ . '/src/back/controller/recruteurController.php';
});

//inscription pour les candidats controlleur
$router->map('GET', '/sucessPage',  function() {
    require __DIR__ . '/src/pages/sucess.php';
});

$router->map('GET', '/errorPage',  function() {
    require __DIR__ . '/src/pages/error.php';
});

//connexion
$router->map('POST', '/autorisation',  function() {
    require __DIR__ . '/src/back/controller/autorisationController.php';
});

//page consultant admin
$router->map('GET', '/adminconsultant',  function() {
    require __DIR__ . '/src/pages/administrateurs/consultant.php';
});

//inscription pour les consultants
$router->map('GET', '/creationconsultant',  function() {
    require __DIR__ . '/src/pages/administrateurs/creationConsultant.php';
});

//inscription pour les consultants
$router->map('GET', '/creationannonce',  function() {
    require __DIR__ . '/src/pages/recruteurs/annonce.php';
});


//postuler annonce 
$router->map('GET', '/postuler/[i:id]', function($id) {
    $controller = new RecruteurController();
    $controller->postuler($id);
});


$router->map('GET', '/activationConsultant/[i:id]', function($id) {
    $controller = new AdministrateurController();
    $controller->activateConsultant($id);
});

$router->map('GET', '/activationCandidat/[i:id]' , function($id) {
    $controller = new ConsulantController();
    $controller->activateCandidat($id);
});

$router->map('GET', '/activationRecruteur/[i:id]' , function($id) {
    $controller = new RecruteurController();
    $controller->activateRecruteur($id);
});

$router->map('GET', '/activationAnnonce/[i:id]' , function($id) {
    $controller = new AnnonceController();
    $controller->activateAnnonce($id);
});

$router->map('GET', '/activationCandidature/[i:id]' , function($id) {
    $controller = new AnnonceController();
    $controller->activationCandidature($id);
});



$router->map('GET', '/articles', function() {
    echo 'Liste des articles';
});
$router->map('GET', '/article/[i:id]', function($id) {
    echo 'Affichage de l\'article ' . $id;
});

// Correspondance de la requête à une route
$match = $router->match();

// Traitement de la route
if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // Si aucune route ne correspond à la requête, afficher une erreur 404
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    echo 'Page non trouvée';
}