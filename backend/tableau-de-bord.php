<?php

//demarage session
$Title ='Dashboard, Afrique Centrale Découverte';

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
<h2 class="text-center">Tableau de bord</h2>

<?php
$req = 'SELECT * FROM agence.user';
$resultat = $conn -> query($req);
$resultat -> fetchAll();

foreach($resultat as $key => $value){
  ?>
<main class="container">

<tr>
    <td class="text-centre"><?php echo $value['id']; ?></td>
    <td class="text-centre"><?php echo $value['nom']; ?></td>
    <td class="text-centre"><?php echo $value['email']; ?></td>
<tr>
 <?php
 }
 ?>

</main>

<?php
require 'include/footer.php';

?>