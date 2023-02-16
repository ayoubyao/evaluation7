<?php
use App\Connection;

class InscriptionRepository {

    public function creerConsultant(Consultant $consultant)
    {
        //creation de l'utlisateur
        $pdo = Connection::getPDO();
        $query = $pdo->query("INSERT INTO utilisateur(username,motdepasse) VALUES (". $consultant->username . "," . $consultant->motdepasse);
        $query->execute();
        $idUtilisateur = $pdo->lastInsertId();

        //creation consultant
        $pdo = Connection::getPDO();
        $query = $pdo->query("INSERT INTO consultant(nom,prenom,idutilisateur) VALUES (". $consultant->nom . "," . $consultant->prenom . "," . $consultant->idutilisateur);
        $query->execute();
        
    }

    public function creerRecruteur(Recruteur $recruteur)
    {
        //creation de l'utlisateur
        $pdo = Connection::getPDO();
        $query = $pdo->query("INSERT INTO utilisateur(username,motdepasse) VALUES (". $recruteur->username . "," . $recruteur->motdepasse);
        $query->execute();
        $idUtilisateur = $pdo->lastInsertId();

        //creation recruteur
        $pdo = Connection::getPDO();
        $query = $pdo->query("INSERT INTO recruteur(nomentreprise,localitation,idutilisateur) VALUES (". $recruteur->nomEntreprise . "," . $recruteur->localitation . "," . $recruteur->idutilisateur);
        $query->execute();
    }

    public function creerCandidat(Candidat $candidat) {

        //creation de l'utlisateur
        $pdo = Connection::getPDO();
        $query = $pdo->query("INSERT INTO utilisateur(username,motdepasse) VALUES (". $candidat->username . "," . $candidat->motdepasse);
        $query->execute();
        $idUtilisateur = $pdo->lastInsertId();

        //creation candidat
        $pdo = Connection::getPDO();
        $query = $pdo->query("INSERT INTO candidat(nom,prenom,idutilisateur) VALUES (". $candidat->nom . "," . $candidat->prenom . "," . $candidat->idUtilisateur);
        $query->execute();

    }
}