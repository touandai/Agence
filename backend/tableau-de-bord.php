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
<h2 class="text-center">Tableau de bord</h2><br>

<main class="container">
<h3> Liste des Utilisateurs </h3>
<table border=2>
      <caption> Admin</caption>
          <thead>
                  <tr>
                      <th class="text-center">Nom</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Statut</th>
                  </tr>
            </thead>
            <tbody>
            <?php
              $req = 'SELECT * FROM agence.user';
              $resultat = $conn -> query($req);
              $resultat -> fetch();
              foreach($resultat as $key => $value){
              ?>
                    <tr class="text-centre">
                        <td><?php echo  $value['nom']; ?></td>
                        <td><?php echo  $value['email']; ?></td>
                        <td><?php echo  $value['statut']; ?></td>
                    </tr>
                    <?php
                      }
                    ?>
              </tbody>
  </table>
</main>




<?php
require 'include/footer.php';

?>