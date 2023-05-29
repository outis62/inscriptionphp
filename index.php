<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/bootstrap-5.2.3-dist/register.css">
    <link rel="stylesheet" href="style/fontawesome/css/all.css">
    <link rel="shortcut icon" href="images/ufrsds.jpg">
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
                        <div class="password-icon">
                            <img src="images/red_eye.svg" width="20" height="20"  alt="" id="oeil" onClick="changere()" style="cursor: pointer;" />
                         </div>
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
                        <input type ="password" placeholder="Mot de passe" id="pass" name="mdp">
                        <label>Mot de passe</label>
                         <div class="password-icon">
                            <img src="images/red_eye.svg" width="20" height="20"  alt="" id="eye" onClick="changer()" style="cursor: pointer;" />
                         </div>
                    </div>
                    <div>
                    <input type="submit" name="submit" value="Enregistrer">
                    </div>
                </form>
            <script>
                // funtion pour l'oeil mdp enregistrement
                 e = true;
                function changer() {
                if (e) {
                document.getElementById("pass").setAttribute("type", "text");
                document.getElementById("eye").src = "images/green_eye.svg";
                e = false;
                 }
                else {
                document.getElementById("pass").setAttribute("type", "password");
                document.getElementById("eye").src = "images/red_eye.svg";
                e = true;
                 }
                 }

                //   function pour l'oeil mdp se connecter
                    a=true;
                    function changere(){
                    if(a){
                    document.getElementById("mdp").setAttribute("type","text");
                    document.getElementById("oeil").src="images/green_eye.svg";
                    a=false;
                    }
                    else{
                    document.getElementById("mdp").setAttribute("type","password");
                    document.getElementById("oeil").src="images/red_eye.svg";
                    a=true; 
                    }
                    }
            </script>
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
</body>

</html>