<?php
$Title ="Gérer les clients";

require 'include/header.php';
require 'include/entete.php';
require 'include/menu-nav.php';

require 'connexion.php';

?>
<br>
<h2 class="text-center">Gestion des Clients</h2>

<main class="contenaire content">

    <section class="container circuit">

        <table class="table table-striped table-bordered">
          
            <caption>Gestion clients</caption>
                <thead>
                        <tr>
                            <th>Id</th>
                            <th>Civilité</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Age</th>
                            <th>Nationalité</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Date d'inscription</th>
                            <th>Statut/Action</th>
                        </tr>
                </thead>
                  
                <tbody>
                  
                    <?php
                        $reqselect = "SELECT * FROM agence.client ORDER BY date_inscription ASC LIMIT 5";
                        $reqselect = $conn -> query ($reqselect);
                        $resultat = $reqselect-> fetchAll();
                        foreach($resultat as $key => $value) {
                    ?>
                   <tr>
                      <td><?php echo $value['id'];?></td>
                      <td><?php echo $value['civilite'];?></td>
                      <td><?php echo $value['nom'];?></td>
                      <td><?php echo $value['prenom'];?></td>
                      <td><?php echo $value['age'];?></td>
                      <td><?php echo $value['nationalite'];?></td>
                      <td><?php echo $value['telephone'];?></td>
                      <td><?php echo $value['email'];?></td>
                      <td><?php echo $value['date_inscription'];?></td>
  
                      <td>
                      <?php ?>
                      <a href="?page=avis&action=supprimer&id=<?php echo $value['id']; ?>"><button class="btn btn-danger"type="submit">Supprimer</button></a>

                      <?php 
                      /*
                      $sup = "DELETE * FROM  agence.circuits where id = :id ";
  
                      $tdr = $conn -> prepare ($sup);
                      $tdr -> execute();
                                      
                      */          
                      ?>
                      
                      
                      </td>
                  </tr>   
              <?php
                  }
              ?>
            </tbody>
        </table>      
    </section>   

    <div class="text-center">
        <a class="lien" href="ajout-client.php">Ajouter des clients </a>
    </div>
    

</main>



<?php
include 'include/footer.php';

?>