<?php
use App\Connection;

Class AutorisationController {

    static function  authentification($username,$password): bool {
        $pdo = Connection::getPDO();
        $query = $pdo->query("SELECT * FROM utilisateur WHERE username = " . $username);
        $utilisateurs = $query->fetchAll();

        foreach ($utilisateurs as$utilisateur) {
            if($utilisateur->motdepasse == $password)
            {
                return true;
            }
        }

        return false;

    }
}

$uname = $_POST['username'];

$pass = $_POST['password'];

$response = AutorisationController::authentification($uname, $pas);
