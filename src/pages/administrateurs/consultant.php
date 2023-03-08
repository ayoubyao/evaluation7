<?php //Lien protégé par l'authentification
require_once __DIR__ . '/../../back/controller/securiteController.php';
require_once __DIR__ . '/../../back/controller/inscriptionController.php';
require_auth(1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consultant</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php 
        $controller = new InscritpionController();
        $consultants = $controller->getAllConsultant();
        echo "<table style='border-width: 1px;border-style: solid;'>";
        echo "<tr>";
        echo "<th>Nom</th>";
        echo "<th>Prenom</th>";
        echo " <th>active</th>";
        echo " <th>action</th>";
        echo "</tr>"; 
        foreach($consultants as $consultant)
        {
            echo "<tr>";
            echo "<td>" . $consultant["nom"]. "</td>";
            echo "<td>" . $consultant["prenom"] . "</td>";
            echo "<td>" . $consultant["isvalid"] . "</td>";
            echo "<td><a href=/activationConsultant/" . $consultant['idconsultant'] . "><button>rendre active</button></a></td>";
            
        }
        echo "</table>";
    ?>
    
    <div class="col-md-12 text-center">
        <a href="/creationconsultant" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">cree un consultant</a>
    </div>
</body>

</html>