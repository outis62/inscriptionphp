<!DOCTYPE html>
<html>
<head>
    <title>Modifier un étudiant</title>
    <link rel="stylesheet" href="../style/bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/fontawesome/css/all.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="shortcut icon" href="../images/ufrsds.jpg">
</head>
<body>
    <h1 class="text-center text-primary modi">Modifier un etudiant</h1>
   <?php
   include('connexionbd.php');
    $edit = $conn->prepare('SELECT * FROM apprenant WHERE id = :edit');
    $edit->bindvalue('edit', $_GET['id'],PDO::PARAM_INT);

    $requeteok = $edit->execute();
    $apprenant = $edit->fetch();
   ?>
   
    <form class="text-center modifiere" method="POST" action="" class="ms-5">
       <input type="hidden" name="edit" value="<?=$apprenant['id']; ?>" >
        <input type="text" id="nouvelle_valeur_1" value="<?= $apprenant['nom']?>" name="nom" required><br/><br/>

        <input type="text" id="prenom" value="<?= $apprenant['prenom']?>" name="prenom" required><br/><br/>

        <input type="date" class="" id="date_naissance" value="<?= $apprenant['date_naissance']?>" name="date_naissance" required><br/><br/>

        <input type="password" id="mdp" placeholder="New mot de passe" name="mdp" required><br/><br/>

        <!-- <button type="submit" name="submit" class="btnmodif"><i class="fa-solid fa-file-pen"></i>Modifier
         <div id="clip">
           <div id="leftTop" class="corner"></div>
           <div id="rightBottom" class="corner"></div>
           <div id="rightTop" class="corner"></div>
           <div id="leftBottom" class="corner"></div>
         </div>
         <span id="rightArrow" class="arrow"></span>
         <span id="leftArrow" class="arrow"></span>
        </button> -->
        <style>
             /* Style the modal background */
    .modal-background {
      display: none;
      position: fixed;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 999;
    }
    
    /* Style the modal content */
    .modal-content {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 20px;
      background-color: white;
      border-radius: 5px;
      z-index: 1000;
    }

    .modal-content img, .modal-content button{
      margin-left: 85px;
    }
        </style>
        <button class="openbtn" type="submit" name="submit">Modifier</button>

  <!-- The modal -->
  <div class="modal-background">
    <div class="modal-content">
      <img src="edit.png" width="50" height="50">
      <p>Apprenant modifier avec success</p>
      <button class="closebtn">OK</button>
    </div>
  </div>
        
        
        <script>
            let modalBG = document.querySelector('.modal-background');

let modalContent = document.querySelector('.modal-content');

let closemodal = document.querySelector('.closebtn');

let openmodal = document.querySelector('.openbtn');

function openModal() {
  modalBG.style.display = 'block';
  modalContent.style.display = 'block';
}

function closeModal() {
  modalBG.style.display = 'none';
  modalContent.style.display = 'none';
}

openmodal.onclick = openModal;
closemodal.onclick = closeModal;
        </script>
        <?php
include('connexionbd.php');

if(isset($_POST['edit'])){
    $edit = $_POST['edit'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];
    $mdp = $_POST['mdp'];
    $mdpcrypt = password_hash($mdp, PASSWORD_DEFAULT);

    try {
        $sql = "UPDATE apprenant SET nom = :nom, prenom = :prenom, date_naissance = :date_naissance, mdp = :mdpcrypt WHERE id = :edit";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':date_naissance', $date_naissance);
        $stmt->bindParam(':mdpcrypt', $mdpcrypt);
        $stmt->bindParam(':edit', $edit, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // $alert = 'Apprenant modifié avec succès';
            // echo $alert;
        }
        else {
            $alert = 'Aucune modification effectuée';
            echo $alert;
        }
    } catch (PDOException $e) {
        $alert = 'Erreur lors de la modification : ' . $e->getMessage();
        echo $alert;
    }
}
?>

    </form>

     <a href="inscrit.php" class="text-decoration-none mt-1 ms-5 btnn"><button class="btnliste"><i class="fa-solid fa-backward"></i><span class="spann">Liste</span></button></a>

    <footer class="bg-light p-5">
      <?php
       include ('footer.php');
      ?>
    </footer>
</body>
</html>
<!-- 
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
        // echo "L'étudiant a été modifié avec succès.";
        } else {
        echo "Erreur lors de la modification de l'étudiant: " . $conn->error;
        }
      }
 -->



