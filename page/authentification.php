 <!-- Connexion et redirection vers la liste des inscrits -->
 <?php
	// Connexion à la base de données
include('connexionbd.php');

// Vérification si le formulaire a été soumis
if (isset($_GET['submit'])) {
    // Récupère les données du formulaire
    $nom = $_GET['nom'];
    $mdp = $_GET['mdp'];

    // Requête de sélection pour récupérer le mot de passe crypté
    $sql = "SELECT mdp FROM apprenant WHERE nom=:nom";
    $requete = $conn->prepare($sql);
    $requete->bindParam(':nom', $nom);
    $requete->execute();
    $resultat = $requete->fetch(PDO::FETCH_ASSOC);

    if ($requete->rowCount() == 1) {
        // La requête a retourné une seule ligne de résultat
        $mdpcrypt = $resultat['mdp'];

        // Vérification si le mot de passe saisi correspond au mot de passe crypté
        if (password_verify($mdp, $mdpcrypt)) {
            echo '<p style="color:black;">Connecté avec succès !</p>';
            header('Location: page/inscrit.php');
			// echo '<a href="page/inscrit.php" target="_blank">Aller à la page Liste</a>';
            exit();
        } else {
            // Si les informations de connexion sont incorrectes, afficher un message d'erreur
            echo '<p style="color:red;">mot de passe incorrect</p>';
        }
    } else {
        // Aucun enregistrement correspondant au nom d'utilisateur
        echo '<p style="color:red;">Nom ou mot de passe incorrect</p>';
    }
}
?>