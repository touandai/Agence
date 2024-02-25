<?php
$Title ='Gérer les Réservation, Afrique Centrale Découverte';

require 'include/header.php';
require 'include/entete.php';
require 'include/menu-nav.php';

require 'connexion.php';

?>
<br>
<h1 class="text-center">Gestion des Réservations</h1>

<main id="circuit" class="container">

   
    <section class="container circuit">
        <table class="table table-striped table-bordered">
          
            <caption>Gestion des Réservations</caption>
                <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre de personnes</th>
                            <th>Prix ttc</th>
                            <th>Type de réglement</th>
                            <th>Numero de Circuit</th>
                            <th>Date de réservation</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                </thead>
                  
                <tbody>
                  
                    <?php
                        $reqselect = "SELECT * FROM agence.reservations ORDER BY date_reservation ASC LIMIT 10";
                        $reqselect = $conn -> query ($reqselect);
                        $resultat = $reqselect-> fetchAll();
                        foreach($resultat as $key => $value) {
                    ?>
                   <tr>
                      <td><?php echo $value['id'];?></td>
                      <td><?php echo $value['nombre_personne'];?></td>
                      <td><?php echo $value['prix'];?></td>
                      <td><?php echo $value['type_reglement'];?></td>
                      <td><?php echo $value['id_circuit'];?></td>
                      <td><?php echo $value['date_reservation'];?></td>
                      <td><?php echo $value['statut'];?></td>
  
                      <td>
                        <form method="POST" action="">
                            <select>
                                <option>--choisir une action--</option>
                                <option value="Confirmée">Confirmée</option>
                                <option value="Confirmée">Annulée</option>
                            </select>
                            <a href="<?php echo $value['id']; ?>"><button class="btn btn-sm btn-success" type="submit" name="valider">Valider</button></a>    
                        </form>                
                      <!--
                      $sup = "DELETE * FROM  agence.circuits where id = :id ";
                      $tdr = $conn -> prepare ($sup);
                      $tdr -> execute();               
                        -->         
                  </tr>   
              <?php
                  }
              ?>
            </tbody>
        </table>      
    </section>

</main>


<?php
include 'include/footer.php';

?>
