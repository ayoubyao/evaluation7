

<?php 
require_once __DIR__ . '/../../back/controller/inscriptionController.php';
require_once __DIR__ . '/../../back/controller/AnnonceController.php';
require_once __DIR__ . '/../../back/controller/securiteController.php';
require_auth(4);

$controller = new AnnonceController();
        $annonces = $controller->getAllAnnonce();
        echo "<table style='border-width: 1px;border-style: solid;'>";
        echo "<tr>";
        echo "<th>lieu</th>";
        echo "<th>intitule</th>";
        echo " <th>action</th>";
        echo "</tr>"; 
        foreach($annonces as $annonce)
        {
            echo "<tr>";
            echo "<td>" . $annonce["lieu"]. "</td>";
            echo "<td>" . $annonce["intitule"] . "</td>";
            echo "<td><a href='/postuler/" . $annonce["idannonce"] . "'><button>Postuler</button></a></td>";
        }
        echo "</table>";

?>
