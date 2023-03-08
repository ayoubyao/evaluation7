<?php
require_once __DIR__ . '/../repository/repository.php';

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $autorisation = new AutorisationController();
    $utilisateur = $autorisation->authentification($_POST['username'], $_POST['password']);
    if ($utilisateur != null) {
        // Si les informations d'identification sont correctes, créez une session
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['email'] = $_POST['username'];
        $_SESSION['role'] = $utilisateur['idrole'];
        $_SESSION['idutilisateur'] = $utilisateur['idutilisateur'];

        switch ($utilisateur['idrole']) {
            case '1':
                header('Location: /adminconsultant');


                break;
            case '2':
                if ($autorisation->verifConsultantIsValid($_SESSION['idutilisateur'])) {
                    header('Location: /indexconsultant');
                } else {
                    header('Location: /errorPage');
                }

                break;
            case '3':
                if ($autorisation->verifRecruteurIsValid($_SESSION['idutilisateur'])) {
                    header('Location: /indexrecruteur');
                } else {
                    header('Location: /errorPage');
                }

                break;
            case '4':
                if ($autorisation->verifCandidatIsValid($_SESSION['idutilisateur'])) {
                    header('Location: /indexcandidat');
                } else {
                    header('Location: /errorPage');
                }

                break;
            default:
                $error = "Nom d'utilisateur ou mot de passe incorrect";
                header('Location: /');
                break;
        }
    } else {
        // Si les informations d'identification sont incorrectes, affichez un message d'erreur
        $error = "Nom d'utilisateur ou mot de passe incorrect";
        header('Location: /');
    }
}


class AutorisationController
{

    public $repo;
    function __construct()
    {
        $this->repo = new Repository();
    }

    public function authentification($username, $password)
    {
        return $this->repo->authentification($username, $password);
    }

    public function getUtilisateurById($userID)
    {
        return $this->repo->getUtilisateurById($userID);
    }

    public function verifConsultantIsValid($idUtilisateur)
    {
        return $this->repo->verifConsultantIsValid($idUtilisateur);
    }
    public function verifCandidatIsValid($idUtilisateur)
    {
        return $this->repo->verifIfCandidatisValid($idUtilisateur);
    }

    public function verifRecruteurIsValid($idUtilisateur)
    {
        return $this->repo->verifrecuteurIsValid($idUtilisateur);
    }
}
