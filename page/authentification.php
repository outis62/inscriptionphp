 <!-- Connexion et redirection vers la liste des inscrits -->
 <?php
	// Connexion à la base de données
    include('connexionbd.php');

	// Vérification si le formulaire a été soumis
	if (isset($_GET['submit'])) {
		// Récupère les données du formulaire
		$nom = $_GET['nom'];
		$mdp = $_GET['mdp'];

		$sql = "SELECT * FROM apprenant WHERE nom=:nom AND mdp=:mdp";
		$requete = $conn->prepare($sql);
        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':mdp', $mdp);
        $requete->execute();
		if ($requete->rowCount() == 1) {
            // La requête a retourné une seule ligne de résultat
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
            echo '<p style="color:black;">Connecté avec succès !</p>';
            header('Location: page/inscrit.php');
            exit();
        } else {
			// Si les informations de connexion sont incorrectes, afficher un message d'erreur
			echo '<p style="color:red;">Nom ou mot de passe incorrect</p>';
		}
	}
?>