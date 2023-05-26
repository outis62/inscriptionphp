<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/bootstrap-5.2.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/bootstrap-5.2.3-dist/register.css">
        <link rel="stylesheet" href="style/fontawesome/css/all.css">
        <link rel="stylesheet" href="">
    <title>Inscription Apprenant.e.s P04</title>
</head>

<body>
   
    <div class="body">
        <h2 class="text-center text-white mt-3 fw-bold">StudentHub</h2>
        <h4></h4>
        <div class="veen">
            <div class="login-btn splits">
                <p>Vous avez un compte</p>
                <button>Connectez-vous</button>
            </div>
            <div class="rgstr-btn splits">
                <p>Vous n'avez pas un compte</p>
                <button class="active">Inscrivez-vous</button>
            </div>
            <div class="wrapper">
                <form id="login" tabindex="500" method="GET" action="">
                    <h3>Connexion</h3>
                    <div class="mail">
                        <input type="text" name="nom" id="nom" required>
                        <label>Nom de famille</label>
                    </div>
                    <div class="passwd">
                        <input type="password" name="mdp" id="mdp" required>
                        <label>Mot de passe</label>
                    </div>
                    <div class="submit">
                    <input type="submit" name="submit" value="Se connecter">
                    </div>
                    <img src="images/ufrsds.jpg" width="80" height="80" class="mt-2">
                    <?php
                      include('page/authentification.php');
                    ?>
                </form>
                <form id="register" tabindex="502" method="POST">
                    <h3>Inscription <img src="images/ufrsds.jpg" width="40" height="40" alt=""></h3>
                    <div class="name">
                        <input type="text" name="nom" required>
                        <label>Nom de famille</label>
                    </div>
                    <div class="prenom">
                        <input type="text" name="prenom" required>
                        <label>Prenom</label>
                    </div>
                    <div class="uid">
                        <input type="date" name="date_naissance" required>
                        <label>Date de naisance</label>
                    </div>
                    <div class="passwd">
                        <!-- <input type="password" id="mdp" name="mdp" required>
                        <i id="oeil" type="submit" class="fas fa-eye" onclick="afficherMotDePasse()"></i>
                        <label>Mot de passe</label> -->

                        <input type ="password" placeholder="Mot de passe" name="mdp">
                        <label>Mot de passe</label>
                         <div class="password-icon">
                           <!-- <i data-feather="eye"></i>
                           <i data-feather="eye-off"></i> -->
                         </div>
                    </div>
                    <div>
                    <input type="submit" name="submit" value="Enregistrer">
                    </div>
                </form>
            </div>
        </div>
        <?php
         include('page/enregistrement.php');
        ?>
    </div>
    <footer class="bg-light p-5">
        <?php
    include ('<page/footer.php');
    ?>
    </footer>
  
     <script  src="script/jquery.3.1.1.min.js"></script>
     <script src="script/register.js"></script>
     <script src=""> </script>
<script>
  feather.replace();
</script>
</body>

</html>