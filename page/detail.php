<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../style/bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <title>Détails de l'étudiant</title>
    <style>
        /* Style pour la fenêtre modale */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #3D5A80;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 60%;
            color: white;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: white;
            text-decoration: none;
            cursor: pointer;
        }
        .lienliste{
            margin-left: 100px!important;
        }
    </style>
    <script src="../script/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function openModal() {
                $('.modal').css('display', 'block');
            }
            function closeModal() {
                $('.modal').css('display', 'none');
            }
            var id = <?php echo isset($_GET['id']) ? $_GET['id'] : 0; ?>;
            if (id > 0) {
                openModal();
            } else {
                alert("ID d'étudiant manquant dans l'URL.");
            }
        });
    </script>
</head>
<body>
    <!-- Fenêtre modale -->
    <div class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Détails de l'étudiant</h2>
            <div class="modal-footer">
            <button class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <!-- <button class="btn btn-primary">Save change</button> -->
        </div>

            <?php

  include('connexionbd.php');

// Récupération de l'ID de l'étudiant depuis l'URL
$id = isset($_GET['id']) ? $_GET['id'] : 0;

$sql = "SELECT * FROM apprenant WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

// Récupération du résultat
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    echo "<p>Nom: " . $row["nom"] . "</p>";
    echo "<p>Prénom: " . $row["prenom"] . "</p>";
    echo "<p>Date de naissance: " . $row["date_naissance"] . "</p>";
    echo "<p>Mot de passe: " . $row["mdp"] . "</p>";
} else {
    echo "Aucun étudiant trouvé avec cet ID.";
}

?>
<a href="inscrit.php" class="btn btn-light w-50 text-center lienliste">Liste</a>

        </div>
    </div>
    <script src="../style/bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
