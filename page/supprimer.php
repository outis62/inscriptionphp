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
