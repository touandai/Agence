<?php
$Title ='Gérer les circuits, Afrique Centrale Découverte';

require 'include/header.php';
require 'include/entete.php';
require 'include/menu-nav.php';

require 'connexion.php';

    //suppression de circuits // 
    if(array_key_exists('valider',$_POST))  {
    
        $id = $_POST['id'];
        $reqsupp = 'DELETE FROM agence.circuits WHERE id = :id';
        $statment = $conn -> prepare($reqsupp);
        $statment -> bindValue(':id',$id);
        $supp =  $statment -> execute();
        if($supp) {
            header('location:?gestion-circuit.php&suppression=1');
            exit();
        }
    }    

    //modification de circuits // 
    if(array_key_exists('valider',$_POST))  {

        function validation_donnees($donnees){
            $donnees = trim($donnees);
            $donnees = stripslashes($donnees);
            $donnees = htmlspecialchars($donnees);
            return $donnees;
            }
                    
            $id = validation_donnees($_POST['id']);
            $prix = validation_donnees($_POST['prix']);
            $date = validation_donnees($_POST['date']);
    
        $id = $_POST['id'];
        $reqModif = 'UPDATE agence.circuits SET prix =:prix, date =:date, date_modification =:date WHERE id = :id';
        $statment = $conn -> prepare($reqModif);
        $statment -> bindValue(':id',$id);
        $modif =  $statment -> execute([

        ":id" => $_POST['id'],
        ":prix" => $_POST['prix'],
        ":date" => $_POST['date'],
        ":date" => date('Y-m-d h:m:s'),

        ]);
        if($modif) {
            header('location:?gestion-circuit.php&modification=1');
            exit();
        }
    }   

?>


<br>
<h2 class="text-center">Gestion des circuits</h2>

<main id="circuit" class="container">

   
    <section class="container circuit">
        <table class="table table-striped table-bordered">
            <caption>Gestion Circuits</caption>
                <thead>
                        <tr>
                            <th>Destination</th>
                            <th>Date de depart</th>
                            <th>Date de retour</th>
                            <th>Prix</th>
                            <th>Type_circuit</th>
                            <th>Date</th>
                            <th>Actions</th>
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
                      <td><?php echo $value['destination'];?></td>
                      <td><?php echo $value['date_depart'];?></td>
                      <td><?php echo $value['date_retour'];?></td>
                      <td><?php echo $value['prix'];?></td>
                      <td><?php echo $value['type_circuit'];?></td>
                      <td><?php echo $value['date'];?></td>
                      <td>
                        <form method="POST" action=""> 
                            <input type="hidden" name="id" value="<?php echo $value['id']; ?>" readonly="true">

                            <button class="btn btn-warning" type="submit" name="modifier">Modifier</button>
                            <button class="btn btn-danger"  type="submit" name="valider" onclick="return confirm('Confirmez-vous cette suppression <?php echo $value['id']; ?> ?')">supprimer</button>
                        </form>
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