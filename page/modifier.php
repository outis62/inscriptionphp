<!DOCTYPE html>
<html>
<head>
    <title>Modifier un étudiant</title>
    <link rel="stylesheet" href="../style/bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/fontawesome/css/all.css">
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <h1 class="text-center text-primary modi">Modifier un etudiant</h1>

    <form class="text-center modifiere" method="POST" action="" class="ms-5">

        <input type="text" id="nouvelle_valeur_1" placeholder="New Nom" name="nom" required><br/><br/>

        <input type="text" id="prenom" placeholder="New Prenom" name="prenom" required><br/><br/>

        <input type="date" class="" id="date_naissance" placeholder="New date de Naissance" name="date_naissance" required><br/><br/>

        <input type="password" id="mdp" placeholder="New mot de passe" name="mdp" required><br/><br/>

        <button type="submit" name="submit" class="btnmodif">
    Modifier
    <div id="clip">
        <div id="leftTop" class="corner"></div>
        <div id="rightBottom" class="corner"></div>
        <div id="rightTop" class="corner"></div>
        <div id="leftBottom" class="corner"></div>
    </div>
    <span id="rightArrow" class="arrow"></span>
    <span id="leftArrow" class="arrow"></span>
</button>
        
        
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
    </form>

     <a href="inscrit.php" class="text-decoration-none mt-2 ms-5 btnn"><button class="btnliste"><i class="fa-solid fa-backward"></i><span class="spann">Liste</span></button></a>


  <footer class="bg-light p-5">
        <?php
    include ('footer.php');
    ?>
    </footer>
</body>
</html>







