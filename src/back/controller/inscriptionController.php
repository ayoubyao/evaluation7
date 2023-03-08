<?php
require_once __DIR__ . '/../repository/repository.php';
require_once __DIR__ . '/../model/recruteur.php';
require_once __DIR__ . '/../model/consultant.php';

if($_POST != null)
{
    $role = $_POST["role"] ? $_POST["role"]  : 0;
} else {
    $role = 0;
}

$controller = new InscritpionController();
switch ($role) {
    case '1': //administrateur

        break;
    case '2': //consultant
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $username = $_POST["email"];

        $consultant = new consultant();
        $consultant->nom = $nom;
        $consultant->prenom = $prenom;
        $consultant->isValid = false;
        $consultant->email = $email;
        $consultant->username = $username;
        $consultant->motdepasse = $password;

        //enregistrement sur la base de donnee
        $controller->inscriptionConsultant($consultant);

        break;
    case '3': //recruteur
        $nomEntreprise = $_POST["nomentreprise"];
        $email = $_POST["email"];
        $motdepasse = $_POST["password"];
        $adresse = $_POST["adresse"];

        //creation de l'objet recruteur
        $recruteur = new Recruteur();
        $recruteur->nomEntreprise = $nomEntreprise;
        $recruteur->localisation = $adresse;
        $recruteur->email = $email;
        $recruteur->motdepasse = $motdepasse;
        $recruteur->username = $email;
        $recruteur->isValid = false;


        //enristrement a la base de donnees
        $controller->inscriptionRecruteur($recruteur);
        break;
    case '4': //candidat
        //recuperation des valeurs du formulaires
        $firstname = $_POST["prenom"];
        $lastname = $_POST["nom"];
        $cv = $_POST["cv"];
        $password = $_POST["password"];
        $username = $_POST["email"];

        //creer l'objet candidat 
        $candidat = new Candidat();
        $candidat->nom = $lastname;
        $candidat->prenom = $firstname;
        $candidat->cv = $cv;
        $candidat->motdepasse = $password;
        $candidat->username = $username;
        $candidat->isValid = false;

        //enristrement dans la base de donnees
        $controller->inscriptionCandidat($candidat);
        break;

    default:
        # code...
        break;
}



class InscritpionController
{
    public $repo; 
    function __construct()
    {
        $this->repo = new Repository();
    }

     
    public function inscriptionConsultant(Consultant $consultant)
    {
        $this->repo->creerConsultant($consultant);
        header("Location: /adminconsultant");
    }

    public function inscriptionCandidat(Candidat $candidat)
    {
        if ($this->repo->creerCandidat($candidat)) {
            header("Location: /sucessPage");
        };
    }

    public function inscriptionRecruteur(Recruteur $recruteur)
    {
        $this->repo->creerRecruteur($recruteur);
        header("Location: /sucessPage");
    }

    public function getAllConsultant()
    {
        return $this->repo->getAllConsultant();
    }

    public function getAllCandidat()
    {
        return $this->repo->getAllCandidat();
    }

    public function getAllRecruteur()
    {
        return $this->repo->getAllRecruteur();
    }

    public function createAnnonce(Annonce $annonce)
    {
        $this->repo->creeAnnonce($annonce);
    }



}
