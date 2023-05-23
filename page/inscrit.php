<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <title>Liste Des Inscrit.e.s</title>
</head>
<body>
    <header>
    <?php
echo "<p class='text-danger text-center fs-3 fw-bold'>BIENVENUE SUR LA LISTE DES INCRIT.E.S DE L'UFR SDS.</p>";
// include('header.php');
?>
</header>
<?php
include('connexionbd.php');

if (isset($_GET['id'])) {
    $idEtudiant = $_GET['id'];

    // Requête SQL pour supprimer l'étudiant de la base de données
    $sql = "DELETE FROM apprenant WHERE id = $idEtudiant";

    if ($conn->query($sql) === TRUE) {
        echo "Étudiant supprimé avec succès.";
    } 
}

// Requête SQL pour sélectionner les noms, prénoms, dates de naissance et mots de passe des utilisateurs
$sql = "SELECT id, nom, prenom, date_naissance, mdp FROM apprenant";

// Exécution de la requête
$stmt = $conn->query($sql);

// Traitement des résultats
echo "<table class='table table-hover'>";
echo "<tr class='bg-secondary text-white'>
<th scope='col'>Numero</th>
<th scope='col' class=''>Nom</th>
<th scope='col'>Prenom</th>
<th scope='col'>Date de naissance</th>
<th scope='col'>Mot de passe</th>
<th scope='col'></th>
<th scope='col'></th>
</tr>";

$numlist = 1;

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $numlist . "</td>";
    echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
    echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
    echo "<td>" . htmlspecialchars($row['date_naissance']) . "</td>";
    echo "<td>" . htmlspecialchars($row['mdp']) . "</td>";
    echo "<td><a href='?id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Voulez-vous vraiment supprimer cet apprenant ?\")'>Supprimer</a></td>";
    echo "<td><a href='modifier.php?id=" . $row['id'] . "' class='btn btn-primary'>Modifier</a></td>";
    echo "</tr>";
    
    $numlist++; 
}

echo "</table>";
?>

<footer class="bg-light p-5">
        <?php
    include ('footer.php');
    ?>
    </footer>
</body>
</html>
