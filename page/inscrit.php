<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/fontawesome/css/all.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="shortcut icon" href="../images/ufrsds.jpg">
    <title>Liste Des Inscrit.e.s</title>
</head>
<body>
  <header>
    <?php
      echo "<p class='text-danger text-center fs-3 fw-bold bienliste'><a href='../index.php'><img src='../images/ufrsds.jpg' width='50' height='50' title='LOGO' /></a>BIENVENUE SUR LA LISTE DES INCRIT.E.S DE L'UFR SDS.</p>";
      // include('header.php');
    ?>
  </header>
  <?php
    include('connexionbd.php');
     //code pour la suppression d'un etudiant de la liste
     if (isset($_GET['id'])) {
      $delete = $_GET['id'];
      $sql = "DELETE FROM apprenant WHERE id = :delete";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':delete', $delete, PDO::PARAM_INT);
      if ($stmt->execute()) {
        // echo "Suppression reussi";
      }
      else {
        echo "Erreur de suppression" . $stmt->errorInfo();
      }
    }
    echo "<div class='container-fluid'>";
    //code pour afficher le tableau
    // Requête SQL pour sélectionner les noms, prénoms, dates de naissance et mots de passe des utilisateurs
   $sql = "SELECT id, nom, prenom, date_naissance FROM apprenant";

   // Exécution de la requête
   $stmt = $conn->query($sql);

   // Traitement des résultats
   echo "<table class='table table-hover'>";
   echo "<tr class='bg-dark position-sticky top-0'>
   <th class='text-center text-white'>N°</th>
   <th class='text-center text-white'>Nom</th>
   <th class='text-center text-white'>Prenom</th>
   <th class='text-center text-white'>Date de naissance</th>
   <th class='text-center text-white'>Actions</th>
   </tr>";

   $odile = 1;

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr class='table-success table-striped-columns'>";
    echo "<td class='text-center'>" . $odile . "</td>";
    echo "<td class='text-center'>" . htmlspecialchars($row['nom']) . "</td>";
    echo "<td class='text-center'>" . htmlspecialchars($row['prenom']) . "</td>";
    echo "<td class='text-center'>" . htmlspecialchars($row['date_naissance']) . "</td>";
    echo "<td class='text-center'><a href='detail.php?id=" . $row['id'] . "' class='btn btn-success'>Details</a>
    <a href='modifier.php?id=" . $row['id'] . "' class='btn btn-primary' onclick='return confirm(\"Voulez-vous vraiment modifier cet apprenant ?\")'>Modifier</a>
    <a href='?id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Voulez-vous vraiment supprimer cet apprenant ?\")'>Supprimer</a></td>";
    echo "</tr>";
    
    $odile++; 
   }

   echo "</table>";
   echo "</div>";
  ?>
  <?php
    echo '<a href="inscription.php" class="text-decoration-none rounded bg-transparent p-2 text-dark ms-5 position-sticky bottom-0 fs-4"><i class="fa-solid fa-house"></i>Inscription</a>'
  ?>
 <footer class="bg-light p-5">
    <?php
    include ('footer.php');
    ?>
 </footer>
    <script src="../style/fontawesone/js/all.js"></script>
</body>
</html>


<!-- 
   if (isset($_GET['id'])) {
      $idEtudiant = $_GET['id'];
  
      $sql = "DELETE FROM apprenant WHERE id = $idEtudiant";
  
      if ($conn->query($sql) === TRUE) {
          echo "Étudiant supprimé avec succès.";
      } 
    }
 -->

 <!-- 
  if (isset($_GET['id'])) {
      $delete = $_GET['id'];
      $sql = "DELETE FROM apprenant WHERE id = :delete";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':delete', $delete, PDO::PARAM_INT);
      if ($stmt->execute()) {
        echo "Suppression reussi";
      }
      else {
        echo "Erreur de suppression" . $stmt->errorInfo()[2];
      }
    }
  -->