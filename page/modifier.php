<?php

include('connexionbd.php');
if (isset($_POST['submit'])) {
    $idEtudiant = $_GET['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];
    $mdp = $_POST['mdp'];
    $mdpcrypt = password_hash($mdp, PASSWORD_DEFAULT); 

    // Requête SQL pour mettre à jour l'étudiant dans la base de données
    $sql = "UPDATE apprenant SET nom = '$nom', prenom = '$prenom', date_naissance = '$date_naissance', mdp = '$mdpcrypt' WHERE id = $idEtudiant";

    // Exécution de la requête SQL
    if ($conn->query($sql)) {
        echo "L'étudiant a été modifié avec succès.";
    } else {
        echo "Erreur lors de la modification de l'étudiant: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier un étudiant</title>
</head>
<body>
    <h1>Modifier un étudiant</h1>

    <form method="POST" action="">
       <input type="number" placeholder="Id etudiant ici" name="id">

        <input type="text" id="nouvelle_valeur_1" placeholder="New Nom" name="nom" required>

        <input type="text" id="prenom" placeholder="New Prenom" name="prenom" required>

        <input type="date" id="date_naissance" placeholder="New date de Naissance" name="date_naissance" required>

        <input type="password" id="mdp" placeholder="New mot de passe" name="mdp" required>

        <input type="submit" name="submit" value="Modifier">
    </form>
</body>
</html>







