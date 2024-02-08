<?php
//demarage de la session//
session_start();

$Title='Compte Client, Afrique Centrale Découverte';

require 'include-frontend/header.php';

require 'connexion.php';

?>

<nav class="container">

    <div class="row">
        <div class="col text-centre">
            <form method="POST" action="annulereservation.php" class="container justify-content-center">
                <button class="btn btn-outline-primary me-2" type="submit" name="annuler">Annuler ma réservation</button>
                <button class="btn btn-outline-primary" type="button"><a style="text-decoration:none" href="modification-info-perso.php">Gérer mes données personnelles</a></button>
            </form>
        <div>

        <div class="col text-centre information-user">
            <span>Bonjour <?= $userConnecte. " (".$userConnecte.")" ?></span>
            <span class="btn-deconnexion"><a href="deconnexion.php"><img src="images/logout.png" alt="Déconnexion"/></a></span>
        </div>
    </div>
</nav>

 <h1 class="text-center"><b>Mon Compte Client</b></h1>


<?php


/*condition: Si l'utilisateur n'est pas connecté.e */

if(!isset($_SESSION['user_data'])) {
  header('location:espaceclient.php');
} 

//Récupération des informations de l'utilisateur connecté

$userConnecte = $_SESSION['user_data'];


?>

<main class="container">



</main>




<?php
require 'include-frontend/footer.php';

?>