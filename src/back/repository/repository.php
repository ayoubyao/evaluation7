<?php
use App\Connection;
require_once __DIR__ . '/connexion.php';
require_once __DIR__ . '/Irepositoryinscription.php';
require_once __DIR__ . '/../model/annoncecandidat.php';
require_once __DIR__ . '/../model/recruteur.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

class Repository implements IRepository {

    public function creerConsultant(Consultant $consultant)
    {
        //creation de l'utlisateur
        $pdo = Connection::getPDO();
        $request = "INSERT INTO utilisateur(username,motdepasse,idrole) VALUES ('". $consultant->email . "','" . $consultant->motdepasse . "',2)";
        $query = $pdo->query($request);
        $idUtilisateur = $pdo->lastInsertId();

        //creation consultant
        $pdo = Connection::getPDO();
        $request = "INSERT INTO consultant(nom,prenom,idutilisateur) VALUES ('". $consultant->nom . "','" . $consultant->prenom . "'," . $idUtilisateur .")";
        $query = $pdo->query($request);

    }

    public function creerRecruteur(Recruteur $recruteur)
    {
        //creation de l'utlisateur
        $pdo = Connection::getPDO();
        $query = "INSERT INTO utilisateur(username,motdepasse,idrole) VALUES ('". $recruteur->username . "','" . $recruteur->motdepasse . "',3)";
        $query = $pdo->query($query);
        $idUtilisateur = $pdo->lastInsertId();

        //creation recruteur
        $pdo = Connection::getPDO();
        $query = "INSERT INTO recruteur(nomentreprise,localisation,idutilisateur) VALUES ('". $recruteur->nomEntreprise . "','" . $recruteur->localisation . "'," . $idUtilisateur . ")";
        $query = $pdo->query($query);
    }

    public function creerCandidat(Candidat $candidat) : bool {

        //creation de l'utlisateur
        $pdo = Connection::getPDO();
        $requete = "INSERT INTO utilisateur(username,motdepasse,idrole) VALUES ('". $candidat->username . "','" . $candidat->motdepasse ."',4)";
        $query = $pdo->query($requete);
        $idUtilisateur = $pdo->lastInsertId();

        //creation candidat
        $pdo = Connection::getPDO();
        $requete = "INSERT INTO candidat(nom,prenom,cv,idutilisateur) VALUES ('". $candidat->nom . "','" . $candidat->prenom . "','" . $candidat->cv . "'," . $idUtilisateur  . ")";
        $query = $pdo->query($requete);

        return true;
    }

    public function  authentification($username,$password) {
        $pdo = Connection::getPDO();
        $query = $pdo->query("SELECT * FROM utilisateur WHERE username = '" . $username . "' AND motdepasse = '" . $password . "'");
        $userFound = $query->fetch(PDO::FETCH_ASSOC);

        if ($userFound != null)
        {
            return $userFound;
        }

        return null;
    }

    public function getUtilisateurById($userID)
    {
        $pdo = Connection::getPDO();
        $query = $pdo->query("SELECT * FROM utilisateur WHERE idutilisateur = " . $userID);
        $user = $query->fetch();

        return $user;
    }

    public function getAllConsultant() {
        $pdo = Connection::getPDO();
        $query = $pdo->query("SELECT * FROM consultant");

        $consultants = $query->fetchAll(PDO::FETCH_ASSOC);
        return $consultants;
    } 

    public function getAllCandidat(){
        $pdo = Connection::getPDO();
        $query = $pdo->query("SELECT * FROM candidat");

        $candidats = $query->fetchAll(PDO::FETCH_ASSOC);
        return $candidats;
    }

    public function getallRecruteur(){
        $pdo = Connection::getPDO();
        $query = $pdo->query("SELECT * FROM recruteur");

        $recruteur = $query->fetchAll(PDO::FETCH_ASSOC);
        return $recruteur;
    }

    

    public function creeAnnonce(Annonce $annonce): bool {
        try {
            $pdo = Connection::getPDO();

        //recuperation id recruteur
        $idutilisateur = $_SESSION["idutilisateur"];
        $request = "SELECT * FROM recruteur WHERE idutilisateur=" . $idutilisateur;
        $query = $pdo->query($request);
        $recruteur = $query->fetch(PDO::FETCH_ASSOC);

        $query = "INSERT INTO annonce(lieu,intitule,horaire,salaire,descriptif,idrecruteur) VALUES ('". $annonce->lieu . "','" . $annonce->intitule . "','" . $annonce->horaire . "'," . $annonce->salaire . ",'" . $annonce->descriptif . "'," . $recruteur['idrecruteur']. ")";
        $query = $pdo->query($query);

        return true;
        } catch (\Throwable $th) {
            return false;
        }
        
    }


	/**
	 * @param int $recruteurId
	 * @return mixed
	 */
	public function getAllAnnonceByrecuteurId(int $recruteurId) {
        $pdo = Connection::getPDO();
        $query = $pdo->query("SELECT * FROM annonce where idrecruteur=" . $recruteurId);

        $Annonces = $query->fetchAll(PDO::FETCH_ASSOC);
        return $Annonces;
	}
	/**
	 * @return mixed
	 */
	public function getAllAnnonce() {
        $pdo = Connection::getPDO();
        $query = $pdo->query("SELECT * FROM annonce");

        $Annonces = $query->fetchAll(PDO::FETCH_ASSOC);
        return $Annonces;
	}

    	/**
	 * @param mixed $idAnnonce
	 * @return mixed
	 */
	public function getAnnoncebyId($idAnnonce) {
        $pdo = Connection::getPDO();
        $query = $pdo->query("SELECT * FROM annonce WHERE idannonce=" . $idAnnonce);

        $Annonces = $query->fetchAll(PDO::FETCH_ASSOC);
        return $Annonces;
	}
 
	/**
	 * @param int $idannonce
	 * @return mixed
	 */
	public function postuler(int $idannonce): bool {
        $iduser =  $_SESSION['idutilisateur'];
        $idCandidat =  $this->getCandidatId($iduser);
        $annonce = $this->getAnnoncebyId($idannonce);

        $pdo = Connection::getPDO();
        $query = "INSERT INTO annoncecandidat(idannonce,idcandidat,isvalid,idrecruteur) VALUES (". $idannonce . "," . $idCandidat . ",0," . $annonce[0]['idrecruteur'] . ")";
        $query = $pdo->query($query);

        return true;
	}

	/**
	 * @param int $idUser
	 * @return mixed
	 */
	public function getCandidatId(int $idUser) : int  {

        $request = "SELECT * FROM candidat WHERE idutilisateur=" . $idUser;

        $pdo = Connection::getPDO();
        $query = $pdo->query( $request);
        $candidat = $query->fetch(PDO::FETCH_ASSOC);

        return $candidat["idcandidat"];
	}

	/**
	 * @param int $idconsultant
	 * @return mixed
	 */
	public function activateConsultant(int $idconsultant) :bool {
        try {
            //4 eme etape cree la  fonction qui va mettre a true isvalid dans le base de donnes
        $request = "UPDATE consultant SET isvalid = 1 WHERE idconsultant = " . $idconsultant;

        $pdo = Connection::getPDO();
        $query = $pdo->query($request);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return false;
        }
        
        return true;

	}

    public function activateCandidat(int $idcandidat) :bool {
        try {
           
        $request = "UPDATE candidat SET isvalid = 1 WHERE idcandidat = " . $idcandidat;

        $pdo = Connection::getPDO();
        $query = $pdo->query($request);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return false;
        }
        
        return true;

	}

     public function activateRecruteur(int $idrecruteur) :bool {
        try {
           
        $request = "UPDATE recruteur SET isvalid = 1 WHERE idrecruteur = " . $idrecruteur;

        $pdo = Connection::getPDO();
        $query = $pdo->query($request);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return false;
        }
        
        return true;

	}

    public function activateAnnonce(int $idAnnonce) :bool {
        try {
           
        $request = "UPDATE annonce SET isvalid = 1 WHERE idannonce = " . $idAnnonce;

        $pdo = Connection::getPDO();
        $query = $pdo->query($request);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return false;
        }
        
        return true;

	}
    public function activationCandidature(int $idannoncecandidat) :bool {
        try {
           
        $request = "UPDATE annoncecandidat SET isvalid = 1 WHERE idannoncecandidat = " . $idannoncecandidat;

        $pdo = Connection::getPDO();
        $query = $pdo->query($request);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return false;
        }
        
        return true;

	}

    /**
	 * @return mixed
	 */
	public function getAllCandidature() {
        $request = "SELECT annoncecandidat.idannonce,idannoncecandidat,annoncecandidat.idcandidat,annoncecandidat.isvalid,lieu,nom,intitule,prenom FROM annoncecandidat, annonce,candidat WHERE annoncecandidat.idannonce = annonce.idannonce AND annoncecandidat.idcandidat = candidat.idcandidat";

        $pdo = Connection::getPDO();
        $query = $pdo->query($request);
        $candidatures = $query->fetchAll(PDO::FETCH_ASSOC);
        $annonceCandidats  =  array();

        for ($i=0; $i < count($candidatures) ; $i++) { 
            $annonceCandidat = new Annoncecandidat();
            $annonceCandidat->idannonce = $candidatures[$i]["idannonce"];
            $annonceCandidat->idannoncecandidat = $candidatures[$i]["idannoncecandidat"];
            $annonceCandidat->idcandidat = $candidatures[$i]["idcandidat"];
            $annonceCandidat->isvalid = $candidatures[$i]["isvalid"];
            $annonceCandidat->lieu = $candidatures[$i]["lieu"];
            $annonceCandidat->nom = $candidatures[$i]["nom"];
            $annonceCandidat->intitule = $candidatures[$i]["intitule"];
            $annonceCandidat->prenom = $candidatures[$i]["prenom"];

            array_push($annonceCandidats, $annonceCandidat);
        }

        return $annonceCandidats;

	}


	/**
	 * @param int $idUtilisateur
	 * @return mixed
	 */
	public function verifConsultantIsvalid(int $idUtilisateur) {

        $request = "SELECT isvalid FROM consultant WHERE idutilisateur = " . $idUtilisateur;

        $pdo = Connection::getPDO();
        $query = $pdo->query($request);
        $isvalid = $query->fetch(PDO::FETCH_ASSOC);

        if($isvalid['isvalid'] == 1){
            return true;
        } else {
            return false;
        }
        
	}
	
	/**
	 *
	 * @param int $idUtilisateur
	 * @return mixed
	 */
	public function verifrecuteurIsValid(int $idUtilisateur) {

        $request = "SELECT isvalid FROM recruteur WHERE idutilisateur = " . $idUtilisateur;

        $pdo = Connection::getPDO();
        $query = $pdo->query($request);
        $isvalid = $query->fetch(PDO::FETCH_ASSOC);

        if($isvalid['isvalid'] == 1){
            return true;
        } else {
            return false;
        }
	}
	
	/**
	 *
	 * @param int $idcandidat
	 * @return mixed
	 */
	public function verifIfCandidatisValid(int $idUtilisateur) : bool {
        $request = "SELECT * FROM candidat WHERE idutilisateur = " . $idUtilisateur;

        $pdo = Connection::getPDO();
        $query = $pdo->query($request);
        $isvalid = $query->fetch(PDO::FETCH_ASSOC);

        if($isvalid['isvalid'] == 1){
            return true;
        } else {
            return false;
        }
        
	}
	/**
	 * @param int $idUser
	 * @return mixed
	 */
	public function getRecruteurId(int $idUser) : int {
        $request = "SELECT * FROM recruteur WHERE idutilisateur=" . $idUser;

        $pdo = Connection::getPDO();
        $query = $pdo->query( $request);
        $recruteur = $query->fetch(PDO::FETCH_ASSOC);

        return $recruteur["idrecruteur"];
	}
	/**
	 * @param int $recruteurId
	 * @return mixed
	 */
	public function GetAllCandidaturebyIdRecruteur(int $recruteurId) {
        $request = "SELECT annoncecandidat.idannonce,idannoncecandidat,annoncecandidat.idcandidat,annoncecandidat.isvalid,lieu,nom,intitule,prenom 
        FROM annoncecandidat, annonce,candidat,recruteur 
        WHERE annoncecandidat.idannonce = annonce.idannonce 
        AND annoncecandidat.idcandidat = candidat.idcandidat 
        AND annonce.idrecruteur = recruteur.idrecruteur
        AND annonce.idrecruteur=" .  $recruteurId .
        " AND annoncecandidat.isvalid=1";

        $pdo = Connection::getPDO();
        $query = $pdo->query($request);
        $candidatures = $query->fetchAll(PDO::FETCH_ASSOC);
        $annonceCandidats  = array();

        for ($i=0; $i < count($candidatures) ; $i++) { 
            $annonceCandidat = new Annoncecandidat();
            $annonceCandidat->idannonce = $candidatures[$i]["idannonce"];
            $annonceCandidat->idannoncecandidat = $candidatures[$i]["idannoncecandidat"];
            $annonceCandidat->idcandidat = $candidatures[$i]["idcandidat"];
            $annonceCandidat->isvalid = $candidatures[$i]["isvalid"];
            $annonceCandidat->lieu = $candidatures[$i]["lieu"];
            $annonceCandidat->nom = $candidatures[$i]["nom"];
            $annonceCandidat->intitule = $candidatures[$i]["intitule"];
            $annonceCandidat->prenom = $candidatures[$i]["prenom"];


            array_push($annonceCandidats,$annonceCandidat);
        }

        return $annonceCandidats;
	}
	/**
	 * @param int $idUser
	 * @return mixed
	 */
	public function getRecruteurByIdUser(int $idUser) {
        $request = "SELECT * FROM recruteur WHERE idutilisateur=" . $idUser;

        $pdo = Connection::getPDO();
        $query = $pdo->query( $request);
        $recruteur = $query->fetch(PDO::FETCH_ASSOC);

        return $recruteur;
	}

    public function getRecuteurbyIDannonceCandidat(int $idannone)
    {
        $request = "SELECT * FROM recruteur,annoncecandidat,utilisateur 
        WHERE recruteur.idrecruteur = annoncecandidat.idrecruteur 
        AND utilisateur.idutilisateur = recruteur.idutilisateur
        AND idannoncecandidat = " . $idannone ;

        $pdo = Connection::getPDO();
        $query = $pdo->query( $request);
        $results = $query->fetch(PDO::FETCH_ASSOC);
        $recruteur = new Recruteur();
        $recruteur->email = $results["email"];
        $recruteur->idRecruteur = $results["idrecruteur"];
        $recruteur->idutilisateur = $results["idutilisateur"];
        $recruteur->username = $results["username"];

        return $recruteur;
    }

	/**
	 * @return mixed
	 */
	public function getAllAnnonceByIdRecrteur() {
	}
	
	/**
	 *
	 * @param int $idAnnonce
	 * @return mixed
	 */
	public function verifIfAnnonceIsValid(int $idAnnonce) {
	}
	
	/**
	 *
	 * @param int $idannonceCandidat
	 * @return mixed
	 */
	public function verififCandidatureIsValid(int $idannonceCandidat) {
	}
}