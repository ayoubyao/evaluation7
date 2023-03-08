<?php //Lien protégé par l'authentification
require_once __DIR__ . '/../../back/controller/securiteController.php';
require_once __DIR__ . '/../../back/controller/inscriptionController.php';
require_once __DIR__ . '/../../back/controller/recruteurController.php';
require_once __DIR__ . '/../../back/controller/AnnonceController.php';
require_auth(2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>condidat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php 
        $controller = new InscritpionController();
        $candidats = $controller->getAllCandidat();
        echo "<h1> Candidat</h1>";
        echo "<table style='border-width: 1px;border-style: solid;'>";
        echo "<tr>";
        echo "<th>Nom</th>";
        echo "<th>Prenom</th>";
        echo " <th>active</th>";
        echo " <th>action</th>";
        echo "</tr>"; 
        foreach($candidats as $candidat)
        {
            echo "<tr>";
            echo "<td>" . $candidat["nom"]. "</td>";
            echo "<td>" . $candidat["prenom"] . "</td>";
            echo "<td>" . $candidat["isvalid"] . "</td>";
            echo "<td><a href=/activationCandidat/" . $candidat['idcandidat'] . "><button>rendre active</button></a></td>";
        }
        echo "</table>";
        

        $Recruteurs = $controller->getallRecruteur();
        echo "<h1>Recruteur</h1>";
        echo "<table style='border-width: 1px;border-style: solid;'>";
        echo "<tr>";
        echo "<th>Nom entreprise</th>";
        echo "<th>lieu</th>";
        echo " <th>active</th>";
        echo " <th>action</th>";
        echo "</tr>"; 
        foreach($Recruteurs as $recruteur)
        {
            echo "<tr>";
            echo "<td>" . $recruteur["nomentreprise"]. "</td>";
            echo "<td>" . $recruteur["localisation"] . "</td>";
            echo "<td>" . $recruteur["isvalid"] . "</td>";
            echo "<td><a href=/activationRecruteur/" . $recruteur['idrecruteur'] . "><button>rendre active</button></a></td>";
        }
        echo "</table>";

        $controller = new AnnonceController();
        $annonces = $controller->getAllAnnonce();
        echo "<h1> Annonce</h1>";
        echo "<table style='border-width: 1px;border-style: solid;'>";
        echo "<tr>";
        echo "<th>lieu</th>";
        echo " <th>intitule</th>";
        echo "<th>active</th>";
        echo " <th>action</th>";
        echo "</tr>"; 

        foreach($annonces as $annonce)
        {
            echo "<tr>";
            echo "<td>" . $annonce["lieu"]. "</td>";
            echo "<td>" . $annonce["intitule"]. "</td>";
            echo "<td>" . $annonce["isvalid"] . "</td>";
        
            echo "<td><a href=/activationAnnonce/". $annonce['idannonce']."><button>rendre active</button></a></td>";
        }
        echo "</table>";

        $controller = new AnnonceController();
        $candidatures = $controller->GetAllCandidature();
        echo "<h1>Candidature </h1>";
        echo "<table style='border-width: 1px;border-style: solid;'>";
        echo "<tr>";
        echo "<th>lieu</th>";
        echo " <th>intitule</th>";
        echo " <th>nom candidat</th>";
        echo " <th>Prenom candidat</th>";
        echo "<th>active</th>";
        echo " <th>action</th>";
        echo "</tr>"; 

        foreach($candidatures as $candidature)
        {
            echo "<tr>";
            echo "<td>" . $candidature->lieu. "</td>";
            echo "<td>" . $candidature->intitule. "</td>";
            echo "<td>" . $candidature->nom. "</td>";
            echo "<td>" . $candidature->prenom. "</td>";
            echo "<td>" . $candidature->isvalid . "</td>";
        
            echo "<td><a href=/activationCandidature/". $candidature->idannoncecandidat."><button>rendre active</button></a></td>";
            echo "<tr>";
        }
        echo "</table>";



    ?>
</body>

</html>