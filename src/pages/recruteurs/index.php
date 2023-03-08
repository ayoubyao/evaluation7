
<?php 

require_once __DIR__ . '/../../back/controller/inscriptionController.php';
require_once __DIR__ . '/../../back/controller/securiteController.php';

require_auth(3);
$controller = new AnnonceController();
$controllerRecruteur = new RecruteurController();
        $idrecruteur = $controllerRecruteur->getIdRecruteur($_SESSION["idutilisateur"]);
        $annonces = $controller->getAllAnnonceByIdRecruteur($idrecruteur);
        echo '<h1>mes Annonces</h1>';
        echo "<table style='border-width: 1px;border-style: solid;'>";
        echo "<tr>";
        echo "<th>Lieu</th>";
        echo "<th>Intitule</th>";
        echo " <th>horaire</th>";
        echo " <th>Salaire</th>";
        echo " <th>Descriptif</th>";
        echo "</tr>"; 
        foreach($annonces as $annonce)
        {
            echo "<tr>";
            echo "<td>" . $annonce["lieu"]. "</td>";
            echo "<td>" . $annonce["intitule"] . "</td>";
            echo "<td>" . $annonce["horaire"] . "</td>";
            echo "<td>" . $annonce["salaire"] . "</td>";
            echo "<td>" . $annonce["descriptif"] . "</td>";
        }
        echo "</table>";

        $controller = new RecruteurController();
        $idUtilisateur = $_SESSION['idutilisateur'];
        $idRecruteur = $controller->getIdRecruteur($idUtilisateur);
        $controller = new AnnonceController();
        $candidatures = $controller->GetAllCandidaturebyIdRecruteur($idRecruteur);
        echo "<h1>Candidatures </h1>";
        echo "<table style='border-width: 1px;border-style: solid;'>";
        echo "<tr>";
        echo "<th>lieu</th>";
        echo " <th>intitule</th>";
        echo " <th>nom candidat</th>";
        echo " <th>Prenom candidat</th>";
        echo "</tr>"; 

        foreach($candidatures as $candidature)
        {
            echo "<tr>";
            echo "<td>" . $candidature->lieu. "</td>";
            echo "<td>" . $candidature->intitule. "</td>";
            echo "<td>" . $candidature->nom. "</td>";
            echo "<td>" . $candidature->prenom. "</td>";
        
            echo "<tr>";
        }
        echo "</table>";
        

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<div class="col-md-12 text-center">
        <button><a href="/creationannonce" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">cree une annonce</a></button>
    </div>

</body>
</html>

