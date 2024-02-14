<?php
$Title ='gestion-circuit, Afrique Centrale Découverte';

require 'include/entete.php';
require 'include/menu-nav.php';

require 'connexion.php';

if(array_key_exists('envoyer',$_POST)){
             echo '<pre>';
             $donneesImages = explode('/', $_FILES['image']['type']);
             $extensionImage = end($donneesImages);
             $nouveauNomImage = sha1(md5(time())) . "." . $extensionImage;
             
             if(false === move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $nouveauNomImage)) {
                header('location:gestion-circuit.php?fichier=error');
                exit();
             }
            if(isset($_POST['destination']) && empty($_POST['destination'])){     
                header("location:?destination=1");
                exit();
                
                }
            if(isset($_POST['date_depart']) && empty($_POST['date_depart'])){   
                header("location:?date_depart=1");
                exit();            
                }

            if(isset($_POST['date_retour']) && empty($_POST['date_retour'])){   
                header("location:?date_retour=1");
                exit();             
                }

            if(isset($_POST['prix']) && empty($_POST['prix'])){   
                header("location:?prix=1");
                exit();             
                }
            if(isset($_POST['date_retour']) && empty($_POST['date_retour'])){   
                header("location:?email=1");
                exit();             
                }
            //if(isset($_POST['image']) && empty($_POST['image'])){   
            //    header("location:?image=1");
             //   exit();             
                    //}
            if(isset($_POST['type_circuit']) && empty($_POST['type_circuit'])){   
                header("location:?type_circuit=1");
                exit();             
                        }
                //fonction pour valider les données et éviter les inections de type XSS

                function validation_donnees($donnees){

                    $donnees = trim($donnees);
                    $donnees = stripslashes($donnees);
                    $donnees = htmlspecialchars($donnees);

                    return $donnees;
                }
                
                    $destination = validation_donnees($_POST['destination']);
                    $date_depart = validation_donnees($_POST['date_depart']);
                    $date_retour = validation_donnees($_POST['date_retour']);
                    $prix = validation_donnees($_POST['prix']);
                    $image = $_FILES['image']['name'];
                    $type_circuit = validation_donnees($_POST['type_circuit']);
                                                 
                        
                                 $reqAjout='INSERT INTO agence.circuits(destination, date_depart, date_retour, prix, type_circuit, date, image)
                                  values (:destination, :date_depart, :date_retour, :prix, :type_circuit, :date, :image)';
                 
                                 $reqInsertion = $conn -> prepare ($reqAjout);
                                 $enregister = $reqInsertion->execute([
                                 
                                 ":destination" => $destination,   
                                 ":date_depart" => $date_depart,
                                 ":date_retour" => $date_retour,
                                 ":prix" => $prix,
                                 ":type_circuit" => $type_circuit,
                                 ":date" =>date('Y-m-d h:m:s'),                                 
                                 ":image" => $nouveauNomImage,
                                 ]);
                                 /* Copier l'image physique dans un dossier sur le serveur */

                                 header("location:succes-validation.php");
                                 
}
 ?>

<h1 class="text-center">Gérer les circuits</h1>

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
                            <th>Image</th>
                            <th>Type_circuit</th>
                            <th>Date</th>
                            <th>Statut/Action</th>
                        </tr>
                </thead>
                  
                <tbody>
                  
                    <?php
                        $reqselect = "SELECT * FROM agence.circuits ORDER BY date ASC";
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
                      <td><?php echo $value['image'];?></td>
                      <td><?php echo $value['type_circuit'];?></td>
                      <td><?php echo $value['date'];?></td>
  
                      <td col="2">
                      <?php ?>

                      <a href="<?php echo $value['id']; ?>"><button class="btn btn-success" type="submit">Ajouter</button></a>    
                       
                      <?php 
                      /*
                      $sup = "DELETE * FROM  agence.circuits where id = :id ";
  
                      $tdr = $conn -> prepare ($sup);
                      $tdr -> execute();
                                      
                      */          
                      ?>
                      
                      <a href="?page=avis&action=supprimer&id=<?php echo $value['id']; ?>"><button class="btn btn-danger"type="submit">Supprimer</button></a>
                      </td>
                  </tr>   
              <?php
                  }
              ?>
            </tbody>
        </table>      
    </section>


    <section class="container circuit">

        <form method="POST" action="" enctype="multipart/form-data">
            
            <fieldset>
                <legend>Ajouter circuits</legend>   

                <div class="mb-3">

                        <label class="form-label"><b> Destination : *</b></label>
                        <select class="form-control" name="destination" id="motif">
                                <option value="0">-- Veuillez renseigner le type de votre demande --</option>
                                <option value="Bakassi">Bakassi</option>
                                <option value="Dzanga-Sangha">Dzanga-Sangha</option>
                                <option value="Pongara">Pongara</option>
                                <option value="Loango">Loango</option>
                        </select>    
                        <?php
                        if(isset($_GET['destination']) && ($_GET['destination']==1)){
                        echo '<span class="red"> Choix Destination obligatoire ! </span>';
                        }
                        ?>

                    </div>

                    <div class="mb-3">
                        <label class="form-label"><b>Date de départ :*</b></label>
                        <input class="form-control" type="text" name="date_depart">    
                        <?php
                        if(isset($_GET['date_depart']) && ($_GET['date_depart']==1)){
                        echo '<span class="red">Veuillez saisir une date de départ </span>';
                        }
                        ?>   
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><b>Date de retour :*</b></label>
                        <input class="form-control" type="text" name="date_retour">
                        <?php
                        if(isset($_GET['date_retour']) && ($_GET['date_retour']==1)){
                        echo '<span class="red">Veuillez saisir une date de retour </span>';
                        }
                        ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><b>Prix : *</b></label>
                        <input class="form-control" type="text" maxlength="8" name="prix">
                        <?php
                        if(isset($_GET['prix']) && ($_GET['prix']==1)){
                        echo '<span class="red"> Saisie Prix obligatoire</span>';
                        }
                        ?>

                    <div class="mb-3">
                        <label class="form-label"><b>Image: *</b></label>
                        <input class="form-control" type="file" maxlength="30" name="image" id="email" placeholder="monadresse@.....">
                        <?php
                        if(isset($_GET['image']) && ($_GET['image']==1)){
                        echo '<span class="red">Télécharger obligatoirement une image !</span>'; 
                        }
                        ?>
                    </div>

                    <select class="form-control me-2" name="type_circuit">
                            <option value="">Choisir type Circuit :*</option>
                            <option value="aller/retour simple">Aller/retour simple</option>
                            <option value="aller/retour simple + hotel">aller/retour simple + hotel</option>
                    </select>
                    <br>
                    <?php
                        if(isset($_GET['type_circuit']) && ($_GET['type_circuit']==1)){
                        echo '<span class="red">Choisir le type de circuit !</span>'; 
                        }
                        ?>

                    <div class="text-center">
                        <button class="btn btn-primary" name="envoyer" type="submit" id="envoyer">Envoyer</button>
                    </div>
            </fieldset>
        </form>
    </section>


</main>

<?php
include 'include/footer.php';

?>