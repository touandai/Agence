<?php
//demarage session
$Title ='gestion-circuit, Afrique Centrale Découverte';

require 'include/header.php';
require 'include/entete.php';
require 'include/menu-nav.php';
require 'connexion.php';



if(!isset($_SESSION['donnees_user'])){ 
    header("location:backend/espaceadmin.php");
  }
  //si on retrouve l'utilisateur//
  $userConnecte = $_SESSION['donnees_user']['nom']; 
  
?>
<br>



<h1 class="text-center">Tableau de bord</h1>

<main class="container">

</main>

<?php
include 'include/footer.php';

?>