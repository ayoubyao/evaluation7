<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/evaluation7/' :
        require __DIR__ . '/src/front/pages/connexion.php';
        break;
    case '' :
        require __DIR__ . '/views/index.php';
        break;
    case '/candidats' :
        require __DIR__ . '/views/about.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}