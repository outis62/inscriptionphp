 <!-- Connexion et redirection vers la liste des inscrits -->
 <?php

include('connexionbd.php');

if (isset($_GET['submit'])) {
    $nom = $_GET['nom'];
    $mdp = $_GET['mdp'];

    $sql = "SELECT mdp FROM apprenant WHERE nom =:nom";
    $requete = $conn->prepare($sql);
    $requete->bindParam(':nom', $nom);
    $requete->execute();
    $resultat = $requete->fetch(PDO::FETCH_ASSOC);

    if ($requete->rowCount() == 1) {
        $mdpcrypt = $resultat['mdp'];

        // Vérification si le mot de passe saisi correspond au mot de passe crypté
        if (password_verify($mdp, $mdpcrypt)) {
            echo '<p style="color: black;">Connecté avec succès !</p>';
            header('Location: page/inscrit.php');
			// echo '<a href="page/inscrit.php" target="_blank">Aller à la page Liste</a>';
            exit();
        } else {

            echo '<p style="color: red;">mot de passe incorrect</p>';
        }
    } else {
      
        echo '<p style="color:red;">Nom ou mot de passe incorrect</p>';
    }
}
?>