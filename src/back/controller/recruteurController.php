<?php

require_once __DIR__ . '/../repository/repository.php';
require_once __DIR__ . '/../model/annonce.php';

if (isset($_POST["lieutravail"])){

    $lieu = $_POST["lieutravail"];
    $intitule = $_POST["intitule"];
    $horaires = $_POST["horaires"];
    $salaire = $_POST["salaire"];
    $descriptiondétaillée = $_POST["descriptif"];
    
    $annonce = new Annonce();
    $annonce->lieu = $lieu;
    $annonce->intitule = $intitule;
    $annonce->horaire = $horaires;
    $annonce->salaire = $salaire;
    $annonce->descriptif = $descriptiondétaillée;
    
    //Enregistrement dans la base de donnee
    $repo = new Repository();
    if($repo->creeAnnonce($annonce))
    {
        header("Location: /sucessPage");
    } 

}

class RecruteurController {
    public $repo; 
    function __construct()
    {
        $this->repo = new Repository();
    }


    public function getAllCandidature()
    {
        
    }

    public function postuler($idAnnonce) 
    {
        if($this->repo->postuler($idAnnonce))
        {
            header("Location: /sucessPage");
        } else {
            header("Location: /errorPage");
        }
    }
    public function activateRecruteur($idRecruteur) : bool {
        try {
           if ($this->repo->activateRecruteur($idRecruteur))
           {
            header("Location: /sucessPage");
           } else 
           {
            header("Location: /errorPage");
           }
            
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }

        return true;
    }

    public function getIdRecruteur($idUtilisateur)
    {
        return $this->repo->getRecruteurId($idUtilisateur);
    }
 
}

?>

