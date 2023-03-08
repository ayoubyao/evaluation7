<?php

interface IRepository {
    public function creerCandidat(Candidat $candidat) : bool;
    public function creerRecruteur(Recruteur $recruteur);
    public function creerConsultant(Consultant $consultant);
    public function authentification($username,$password);
    public function getUtilisateurById($userID);
    public function getAllConsultant();
    public function getAllCandidat();
    public function creeAnnonce(Annonce $annonce);
    public function getAllAnnonceByrecuteurId(int $recruteurId);
    public function GetAllCandidaturebyIdRecruteur(int $recruteurId);
    public function getAllAnnonce();
    public function getAllAnnonceByIdRecrteur();
    public function getAnnoncebyId($idAnnonce);
    public function postuler(int $idannonce) : bool;
    public function getCandidatId(int $idUser);
    public function getRecruteurId(int $idUser);
    public function getRecruteurByIdUser(int $idUser);
    public function activateConsultant (int $idconsultant);
    public function verifConsultantIsvalid(int $idConsultant);
    public function verifrecuteurIsValid(int $idRecruteur);
    public function verifIfCandidatisValid(int $idcandidat);
    public function verifIfAnnonceIsValid(int $idAnnonce);
    public function verififCandidatureIsValid(int $idannonceCandidat);
    public function getAllCandidature();
    public function getRecuteurbyIDannonceCandidat(int $idannone);

}
