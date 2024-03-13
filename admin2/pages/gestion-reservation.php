<?php
$Title ='Gérer les Réservation, Afrique Centrale Découverte';

require 'include/header.php';
require 'include/entete.php';
require 'include/menu-nav.php';

require 'connexion.php';
                  
             
if(array_key_exists('valider',$_POST)){
    
    function validation_donnees($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
        }
                
        $id = validation_donnees($_POST['id']);
        $statut = validation_donnees($_POST['statut']);
        $date_modif = date('Y-m-d h:m:s');

                      
        $req = 'UPDATE agence.reservations  SET statut = :statut, date_validation = :date WHERE id = :id';
        $statement = $conn -> prepare($req);
        $statement -> bindValue(':id',$id);
        $statement -> bindValue(':statut',$statut);
        $statement -> bindValue(':date',$date_modif);
        $valider = $statement-> execute ();
        
        //":id" => $_POST['id'],
        //":statut" => $_POST['statut'],
        //":date" => date('Y-m-d h:m:s'),

         if($statement){
            header("location:?pages=gestion-réservation.php&succes=1");
            }else {
                echo "<strong> problème technique, Merci de réessayer plus tard ! </strong>";
            }

}

if(isset($_POST['supprimer'])){

    $id = $_POST['id'];
    $reqsupp = 'DELETE FROM agence.reservations WHERE id = :id';
    $statment = $conn -> prepare($reqsupp);
    $statment -> bindValue(':id',$id);
    $supp =  $statment -> execute();
    
    //condition si le client a déjà réservé//
    if($supp) {
        header('location:?gestion-reservation&suppression=1');
        exit();
    }

}

?>



<br>
<h2 class="text-center">Gestion des Réservations</h2>

<main id="circuit" class="container">

   
    <section class="container circuit">
        <table class="table table-striped table-bordered">
          
            <caption>Gestion des Réservations</caption>
                <thead>
                        <tr>
                            <th>Id Réservation</th>
                            <th>Nbre de personnes</th>
                            <th>Prix ttc</th>
                            <th>Type de réglement</th>
                            <th>Référence Circuit</th>
                            <th>Date de réservation</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                </thead>
                  
                <tbody>
                  
                    <?php
                        $reqselect = "SELECT * FROM agence.reservations ORDER BY statut ASC LIMIT 6";
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
                            <input type="hidden" name="id" value="<?php echo $value['id']; ?>" readonly="true">
                            <select name="statut">
                                <option value="">modifier</option>
                                <option value="Confirmée">Confirmée</option>
                                <option value="Annulée">Annulée</option>
                            </select>
                            <button class="btn btn-success btn-sm" type="submit" name="valider">Valider</button>
                            <button class="btn btn-danger btn-sm" type="submit" name="supprimer" onclick="return confirm('Confirmez-vous cette suppression?')">Supprimer</button>
                        </form>
                      </td>                     
                    </tr>   
                    <?php
                    }
                    ?>
            </tbody>
        </table>      
    </section>

</main>

<?php
require 'include/footer.php';

?>
