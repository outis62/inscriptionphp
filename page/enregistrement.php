<?php
	// Vérifie si le formulaire est soumis
	if(isset($_POST['submit'])){
		// Récupère les données du formulaire
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$date_naissance = $_POST['date_naissance'];
		$mdp = $_POST['mdp'];
        $mdpcrypt = password_hash($mdp, PASSWORD_DEFAULT); 

		include ('connexionbd.php');


			// Prépare et exécute la requête SQL d'insertion
			$sql = "INSERT INTO apprenant (nom, prenom, date_naissance, mdp) VALUES (:nom, :prenom, :date_naissance, :mdpcrypt)";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':nom', $nom);
			$stmt->bindParam(':prenom', $prenom);
			$stmt->bindParam(':date_naissance', $date_naissance);
			$stmt->bindParam(':mdpcrypt', $mdpcrypt);
			$stmt->execute();

			echo '<p style="color=black;">Les informations ont été enregistrées avec succès.</p>';
			

	}
	?>