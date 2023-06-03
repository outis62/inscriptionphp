<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
    <title>AdminInscription/UFR/SDS/UJKZ</title>
</head>
<body>
<?php
    session_start();
    if (isset($_SESSION['inscrit'])) {
        // L'utilisateur est déjà inscrit, masquer le formulaire d'inscription
        echo "<p>Vous êtes déjà inscrit.</p>";
    } else {
        // L'utilisateur n'est pas encore inscrit, afficher le formulaire d'inscription
    }
    ?>
    <header>
        <style>
* {
	box-sizing: border-box;
}

body {
	background: linear-gradient(60deg, rgb(194, 130, 27) 0%, rgb(184, 47, 16) 100%)!important;
	font-family: 'Open Sans', sans-serif;
	display: flex;
	align-items: center;
	justify-content: center;
	min-height: 100vh;
	margin: 0;
}

.container {
	background-color: #fff;
	border-radius: 5px;
	box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
	overflow: hidden;
	width: 400px;
	max-width: 100%;
    /* height: 500px; */
}

.header {
	border-bottom: 1px solid #f0f0f0;
	background-color: #f7f7f7;
	padding: 20px 40px;
}

.header h2 {
	margin: 0;
    text-align: center;
}

.form {
	padding: 30px 40px;	
}

.form-control {
	/* margin-bottom: 5px; */
	padding-bottom: 20px;
	position: relative;
}

.form-control label {
	display: inline-block;
	/* margin-bottom: 2px; */
}

.form-control input {
	border: 2px solid #f0f0f0;
	border-radius: 4px;
	display: block;
	font-family: inherit;
	font-size: 14px;
	padding: 10px;
	width: 100%;
}

.form-control input:focus {
	outline: 0;
	border-color: #777;
}

.form-control.success input {
	border-color: #2ecc71;
}

.form-control.error input {
	border-color: #e74c3c;
}

.form-control i {
	visibility: hidden;
	position: absolute;
	top: 40px;
	right: 10px;
}

.form-control.success i.fa-check-circle {
	color: #2ecc71;
	visibility: visible;
}

.form-control.error i.fa-exclamation-circle {
	color: #e74c3c;
	visibility: visible;
}

.form-control small {
	color: #e74c3c;
	position: absolute;
	bottom: 0;
	left: 0;
	visibility: hidden;
}

.form-control.error small {
	visibility: visible;
}

.form button {
	background: linear-gradient(60deg, rgb(194, 130, 27) 0%, rgb(184, 47, 16) 100%)!important;
	border: 2px solid #8e44ad;
	border-radius: 4px;
	color: #fff;
    cursor: pointer;
	display: block;
	font-family: inherit;
	font-size: 16px;
	padding: 10px;
	margin-top: 20px;
	width: 100%;
}

.floating-btn {
	border-radius: 26.5px;
	background-color: #001F61;
	border: 1px solid #001F61;
	box-shadow: 0 16px 22px -17px #03153B;
	color: #fff;
	cursor: pointer;
	font-size: 16px;
	line-height: 20px;
	padding: 12px 20px;
	position: fixed;
	bottom: 20px;
	right: 20px;
	z-index: 999;
}

.floating-btn:hover {
	background-color: #ffffff;
	color: #001F61;
}

.floating-btn:focus {
	outline: none;
}

@media screen and (max-width: 480px) {

	.social-panel-container.visible {
		transform: translateX(0px);
	}
	
	.floating-btn {
		right: 10px;
	}
}
        </style>
    </header>

    <div class="container">
	<div class="header">
		<h2>Inscription Admin</h2>
	</div>
	<form id="form" class="form" method="POST" action="adminenregistrement.php">
    <div class="form-control">
			<label for="username">Nom</label>
			<input type="text" name="nom" id="nom" required/>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
    <div class="form-control">
			<label for="username">Prenom</label>
			<input type="text" name="prenom" id="prenom" required/>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<div class="form-control">
			<label for="username">Username</label>
			<input type="text" name="usernam" placeholder="@zabre62" id="username" required/>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<div class="form-control">
			<label for="username">Email</label>
			<input type="email" name="email" placeholder="zabre@gmail.com" id="email" required/>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<div class="form-control">
			<label for="username">Password</label>
			<input type="password" name="passworde" placeholder="Passworde" id="password" required/>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>

		<input type="submit" name="submit" value="Enregistrer" />
	</form>
</div>

<button class="floating-btn">UJKZ</button>
</body>
</html>