<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminEnregistrement</title>
</head>
<body>
    <?php
     session_start();
     if (isset($_SESSION['inscrit'])) {
         // L'utilisateur est déjà inscrit, masquer le formulaire d'inscription
         echo "<p>Vous êtes déjà inscrit.</p>";
     } else {
     }
    // Vérifie si le formulaire est soumis
    if(isset($_POST['submit'])){
        // Récupère les données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $usernam = $_POST['usernam'];
        $email = $_POST['email'];
        $passworde = $_POST['passworde'];
        $passwordecrypt = password_hash($passworde, PASSWORD_DEFAULT); 

        include ('connexionbd.php');

        try {
            // Prépare et exécute la requête SQL d'insertion
            $sql = "INSERT INTO user (nom, prenom, usernam, email, passworde) VALUES (:nom, :prenom, :usernam, :email, :passwordecrypt)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':usernam', $usernam);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':passwordecrypt', $passwordecrypt);
            $stmt->execute();

            echo '<p style="color: white; text-align: center; font-weight: bold; text-italic">Apprenant.e.s enregistré.e.s avec succès.</p>';
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    ?> 
</body>
</html>
