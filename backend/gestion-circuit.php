<?php
$Title ='Gérer les circuits, Afrique Centrale Découverte';

require 'include/header.php';
require 'include/entete.php';
require 'include/menu-nav.php';

require 'connexion.php';

    
    //suppression de circuits //
    if(array_key_exists('valider',$_POST))  {
    
        function validationdonnees($donnees){
            $donnees = trim($donnees);
            $donnees = stripslashes($donnees);
            $donnees = htmlspecialchars($donnees);
            return $donnees;
            }
        $id = validationdonnees($_POST['id']);


        $reqsupp = 'DELETE FROM agence.circuits WHERE id = :id';
        $statment = $conn -> prepare($reqsupp);
        $statment -> bindValue(':id',$id);
        $supp =  $statment -> execute();
        if($supp) {
            header('location:?gestion-circuit.php&suppression=1');
            exit();
        }
    }

    //modification de circuit//
    if(array_key_exists('modifier',$_POST))  {

            function validationdonnees($donnees){
            $donnees = trim($donnees);
            $donnees = stripslashes($donnees);
            $donnees = htmlspecialchars($donnees);
            return $donnees;
            }
                    
            $id = validationdonnees($_POST['id']);
            $prix = validationdonnees($_POST['prix']);
            $date_modif = date('Y-m-d h:m:s');

            $reqModif = 'UPDATE agence.circuits SET prix =:prix, date_modification =:date WHERE id = :id';
            $modification = $conn -> prepare($reqModif);
            $modification -> bindValue(':id',$id);
            $modification -> bindValue(':prix',$prix);
            $modification -> bindValue(':date',$date_modif);

            $modif =  $modification -> execute();

            if($modif) {
                header("location:?gestion-circuit.php&modification=1");
                exit();
            }else{
                header("location:?gestion-circuit.php&modification=0");
            }

    }

?>


<br>
<h2 class="text-center">Gestion des circuits</h2>

<main id="circuit" class="container">
<?php 
    if(isset($_GET['modification']) && ($_GET['modification'] == 1)) {
    ?>
    <div style="padding: 20px;color: #ffffff;background: green;text-align:center;"> Modification effectuée avec succès!</div>
    <?php
    }
    ?>
    <?php
    if(isset($_GET['suppression']) && ($_GET['suppression'] == 1)) {
    ?>
    <div style="padding: 20px;color: #ffffff;background: red;text-align:center;"><b>Le circuit est bien supprimé !</b></div>
    <?php
    }
    ?>
   
    <section class="container circuit">
        <table class="table table-striped table-bordered">
            <caption>Gestion Circuits</caption>
                <thead>
                        <tr>
                            <th class="text-center">Destination</th>
                            <th class="text-center">Date de depart</th>
                            <th class="text-center">Date de retour</th>
                            <th class="text-center">Prix</th>
                            <th class="text-center">Type_circuit</th>
                            <th class="text-center">Date Publication</th>
                            <th class="text-center">Actions</th>
                        </tr>
                </thead>
                  
                <tbody>
                    <?php
                        $reqselect = "SELECT * FROM agence.circuits ORDER BY date DESC LIMIT 6";
                        $reqselect = $conn -> query ($reqselect);
                        $resultat = $reqselect-> fetchAll();
                        foreach($resultat as $key => $value) {
                    ?>
                   <tr>
                      <td class="text-centre"><?php echo $value['destination'];?></td>
                      <td class="text-centre"><?php
                       setlocale(LC_TIME,'fr');
                       $datefr = strftime('%d/%m/%Y',strtotime($value['date_depart']));
                       echo $datefr ?>
                       </td>
                      <td class="text-centre"><?php
                        setlocale(LC_TIME,'fr');
                        $datefr = strftime('%d/%m/%Y',strtotime($value['date_retour']));
                        echo $datefr ?>
                       </td>
                      <td class="text-centre"><?php echo $value['prix'];?></td>
                      <td class="text-centre"><?php echo $value['type_circuit'];?></td>
                      <td class="text-centre"><?php
                           setlocale(LC_TIME,'fr');
                           $datefr = strftime('%d/%m/%Y',strtotime($value['date']));
                           echo $datefr ?>
                      </td>
                      <td class="text-centre">
                        <form method="POST" action="">
                            <input type="hidden" name="id" value="<?php echo $value['id']; ?>" readonly="true">
                            <input type="text" name="prix" placeholder="Indiquer le nouveau prix">
                            <!--<a class="btn btn-warning" href ="modif-circuit.php">Modifier</a>-->

                            <button class="btn btn-warning btn-sm" type="submit" name="modifier" id="modifier"
                            onclick="return confirm('Confirmez-vous la modification <?php echo $value['id']; ?> ?')">
                                Modifier</button>
                            <button class="btn btn-danger btn-sm"  type="submit" name="valider"
                            onclick="return confirm('Confirmez-vous cette suppression <?php echo $value['id']; ?> ?')">
                                supprimer</button>
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
require 'include/footer.php';

?>