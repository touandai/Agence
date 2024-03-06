<?php
$Title ='Gérer les circuits, Afrique Centrale Découverte';

require 'include/header.php';
require 'include/entete.php';
require 'include/menu-nav.php';

require 'connexion.php';


 ?>

<br>
<h2 class="text-center">Gestion des circuits</h2>

<main id="circuit" class="container">

   
    <section class="container circuit">
        <table class="table table-striped table-bordered">
          
            <caption>Gestion Circuits</caption>
                <thead>
                        <tr>
                            <th>Id</th>
                            <th>Destination</th>
                            <th>Date de depart</th>
                            <th>Date de retour</th>
                            <th>Prix</th>
                            <th>Type_circuit</th>
                            <th>Date</th>
                            <th>Statut/Action</th>
                        </tr>
                </thead>
                  
                <tbody>
                  
                    <?php
                        $reqselect = "SELECT * FROM agence.circuits ORDER BY date ASC LIMIT 5";
                        $reqselect = $conn -> query ($reqselect);
                        $resultat = $reqselect-> fetchAll();
                        foreach($resultat as $key => $value) {
                    ?>
                   <tr>
                      <td><?php echo $value['id'];?></td>
                      <td><?php echo $value['destination'];?></td>
                      <td><?php echo $value['date_depart'];?></td>
                      <td><?php echo $value['date_retour'];?></td>
                      <td><?php echo $value['prix'];?></td>
                      <td><?php echo $value['type_circuit'];?></td>
                      <td><?php echo $value['date'];?></td>
  
                      <td col="2">
                      <button class="btn btn-warning" type="submit">Modifier</button></a> 
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
        <a class="lien" href="ajout-circuit.php">Ajouter des circuits</a>
    </div>

</main>

<?php
include 'include/footer.php';

?>