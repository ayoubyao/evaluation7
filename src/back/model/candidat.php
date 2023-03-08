<?php
require_once __DIR__ . '/utilisateur.php';

class Candidat extends Utilisateur {
    public $nom;
    public $prenom;
    public $cv;
    public $idUtilisateur;
    public $isValid;
}