<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Liste Des Inscrit.e.s</title>
</head>
<body>
    <header>
    <?php
echo '<p style="color=white;">BIENVENUE SUR LA LISTE DES INCRIT.E.S A SIMPLON.CO.</p>';

?>
</header>
<?php
    // Connexion à la base de données
    $sndbn = 'mysql:host=localhost;dbname=simploninscription';
    $username = 'root';
    $password = '';
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    $conn = new PDO($sndbn, $username, $password, $options);

    // Requête SQL pour sélectionner les noms, prenoms, dates de naissance et mots de passe des utilisateurs
    $sql = "SELECT nom, prenom, date_naissance, mdp FROM apprenant";

    // Exécution de la requête
    $stmt = $conn->query($sql);

    // Traitement des résultats
    echo "<table>";
    echo "<tr>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Date de naissance</th>
    <th>Mot de passe</th>
    </tr>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
        echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
        echo "<td>" . htmlspecialchars($row['date_naissance']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mdp']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
?>   
</body>
</html>
