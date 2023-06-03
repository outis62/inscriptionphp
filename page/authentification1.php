 <!-- Connexion et redirection vers la liste des inscrits -->
 <?php

include('connexionbd.php');

if (isset($_GET['submit'])) {
    $usernam = $_GET['usernam'];
    $passworde = $_GET['passworde'];

    $sql = "SELECT passworde FROM user WHERE usernam = :usernam";
    $requete = $conn->prepare($sql);
    $requete->bindParam(':usernam', $usernam);
    $requete->execute();
    $resultat = $requete->fetch(PDO::FETCH_ASSOC);

    if ($requete->rowCount() == 1) {
        $passwordecrypt = $resultat['passworde'];

        // Vérification si le mot de passe saisi correspond au mot de passe crypté
        if (password_verify($passworde, $passwordecrypt)) {
            echo '<p style="color: black;">Connecté avec succès !</p>';
            header('Location: inscription.php');
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