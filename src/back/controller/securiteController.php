<?php
// Fonction de vérification d'authentification
function require_auth($role)
{
    if (!isset($_SESSION['username'])) {
        header('Location: /');
        exit;
    } 
    if(isset($_SESSION['role']) && $_SESSION['role'] != $role)
    {
        header('Location: /errorPage');
        exit;
    }
}
?>