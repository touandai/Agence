<?php
//création cookie : retenir l'email //
setcookie('userlog', 'client',
[
'expires' => time() + 7*24*3600,
'secure' => true,
'httponly' => true,
]);


//demarrage session//
session_start();
$Title='Compte Personnel, Afrique Centrale Découverte';

require 'include-frontend/header.php';
require 'connexion.php';


//Si l'utilisateur n'est pas connecté//
if(!isset($_SESSION['donnees_client'])){ 
  header("location:backend/espaceadmin.php");
}
//si on retrouve l'utilisateur//
$clientConnecte = $_SESSION['donnees_client']; 

?>


<nav id="nav-dashboard" class="container text-center">
            <div class="div-menu-dashboard">
                <a class="lien menu" href="tableau-de-bord-client.php"><b>Compte Client</b></a>
                <a class="lien menu" href="gestion-reservation.php"><b>Gérer ma réservation</b></a>  
                <a class="lien menu" href="gestion-compteclient.php"><b>Informations personnelles</b></a>
            </div>    
            <div class="user-infos">
                <span class="btn-deconnexion"><strong>Bonjour, <?= $_SESSION['donnees_client']['prenom']; ?></strong></span>
                <span class="btn-deconnexion"><a href="deconnexion.php"><strong class="red">Me déconnecter </strong> <img src="images/logout.png" alt="Déconnexion"/></a></span>
            </div>
</nav>

