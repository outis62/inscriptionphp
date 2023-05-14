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

?>
</header>
<?php
    // Connexion à la base de données
    include('connexionbd.php');
    // Requête SQL pour sélectionner les noms, prenoms, dates de naissance et mots de passe des utilisateurs
    $sql = "SELECT id, nom, prenom, date_naissance, mdp FROM apprenant";

    // Exécution de la requête
    $stmt = $conn->query($sql);

    // Traitement des résultats
    echo "<table class='table table-hover'>";
    echo "<tr class='bg-secondary text-white'>
    <th scope='col'>ID</th>
    <th scope='col' class=''>Nom</th>
    <th scope='col'>Prénom</th>
    <th scope='col'>Date de naissance</th>
    <th scope='col'>Mot de passe</th>
    </tr>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
        echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
        echo "<td>" . htmlspecialchars($row['date_naissance']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mdp']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
?>

<div class="container listemenu">
    <div class="row">
     <div class="col-md-3">
       <form method="GET" action="">
        <input type="number" name="id" id="id" placeholder="ID étudiant a supprimer" Required>
          <button class="supp" type="submit" name="submit"><span class="box">Supprimer</span></button>
        </form>
     </div>
     <div class="col-md-3">
        <form method="" action="">
          <input type="hidden" name="etudiant_id" value="<?php echo $etudiant['id']; ?>">
          <button class="modifier"><span>Modifier</span></button>
        </form>
     </div>
     <div class="col-md-3">
        <form method="post" action="">
          <input type="hidden" name="etudiant_id" value="<?php echo $etudiant['id']; ?>">
          <button class="detail"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" 
          width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" 
          d="M5 13c0-5.088 2.903-9.436 7-11.182C16.097 3.564 19 7.912 19 13c0 .823-.076 1.626-.22 
          2.403l1.94 1.832a.5.5 0 0 1 .095.603l-2.495 4.575a.5.5 0 0 1-.793.114l-2.234-2.234a1 1 0 0 
          0-.707-.293H9.414a1 1 0 0 0-.707.293l-2.234 2.234a.5.5 0 0 1-.793-.114l-2.495-4.575a.5.5 0 
          0 1 .095-.603l1.94-1.832C5.077 14.626 5 13.823 5 13zm1.476 6.696l.817-.817A3 3 0 0 1 9.414 
          18h5.172a3 3 0 0 1 2.121.879l.817.817.982-1.8-1.1-1.04a2 2 0 0 
          1-.593-1.82c.124-.664.187-1.345.187-2.036 0-3.87-1.995-7.3-5-8.96C8.995 5.7 7 9.13 7 13c0 
          .691.063 1.372.187 2.037a2 2 0 0 1-.593 1.82l-1.1 1.039.982 1.8zM12 13a2 2 0 1 1 0-4 2 2 
          0 0 1 0 4z"></path></svg><span>Details</span></button>
        </form>
     </div>
     <div class="col-md-3">
        <form method="" action="">
          <input type="hidden" name="etudiant_id" value="<?php echo $etudiant['id']; ?>">
          <button class="download" style="vertical-align:middle"><span>Telecharger</span></button>
        </form>
     </div>
    </div>  
</div>
<!-- code pour la suppression -->
<?php
include('connexionbd.php');
if (isset($_GET['submit'])) {
    $idEtudiant = $_GET['id'];

    // Requête SQL pour supprimer l'étudiant de la base de données
    $sql = "DELETE FROM apprenant WHERE id = $idEtudiant";

    if ($conn->query($sql) === TRUE) {
        echo "Étudiant supprimé avec succès.";
    } 
}
?>
<footer class="bg-light p-5">
        <?php
    include ('footer.php');
    ?>
    </footer>
</body>
</html>
