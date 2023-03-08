<?php 

class AnnonceController
{
    public $repo;

    function __construct()
    {
        $this->repo = new Repository();
    }

    public function activateAnnonce($idAnnonce) : bool {
        try {
           if ($this->repo->activateAnnonce($idAnnonce))
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

    public function activationCandidature($idannoncecandidat) : bool {
        try {
           if ($this->repo->activationCandidature($idannoncecandidat))
           {

            $recruteur = $this->repo->getRecuteurbyIDannonceCandidat($idannoncecandidat);
            mail($recruteur->email,"candidature validée","Un candidat postule a votre annonce, Sa canditature a ete valide par nos service");
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
    public function GetAllAnnonce() {
        return $this->repo->getAllAnnonce();
        
    }

    public function getAllAnnonceByIdRecruteur($idRecruteur)
    {
        return $this->repo->getAllAnnonceByrecuteurId($idRecruteur);
    }

    public function GetAllCandidature() {
        return $this->repo->getAllCandidature();
    }

    public function GetAllCandidaturebyIdRecruteur($idRecruteur){
        return $this->repo->GetAllCandidaturebyIdRecruteur($idRecruteur);
    }
}