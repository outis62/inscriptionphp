<?php
// Connexion à la base de données
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'simploninscription';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

//On essaie de se connecter
try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password, $options);
    //On définit le mode d'erreur de PDO sur Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }

?>