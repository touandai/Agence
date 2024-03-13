<?php
$Title ="Ajout Circuits";

require 'include/header.php';
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

                       if($enregister){
                        header("location:?ajout-circuit.php&succes=1");die;
                       }

                        
                        
}

?>

<main class="container">
    <section class="container circuit">

        <form id="ajoutcircuit" method="POST" action="" enctype="multipart/form-data">
    
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
                <label class="form-label"><b>Prix TTC : *</b></label>
                <select class="form-control me-2" name="prix">
                        <option value="">--Selectionner--</option>
                        <option value="165000">165000</option>
                        <option value="235000">235000</option>
                        <option value="170000">170000</option>
                        <option value="240000">240000</option>
                        <option value="105000">105000</option>
                        <option value="155000">155000</option>
                        <option value="90000">90000</option>
                        <option value="140000">140000</option>
                </select>
                <?php
                if(isset($_GET['prix']) && ($_GET['prix']==1)){
                echo '<span class="red"> Saisie Prix obligatoire</span>';
                }
                ?>
                <div class="mb-3">
                <label class="form-label"><b>Type de Circuit: *</b></label>
                <select class="form-control me-2" name="type_circuit">
                        <option value="">--Selectionner--</option>
                        <option value="aller/retour simple">Aller/Retour simple</option>
                        <option value="aller/retour simple + hotel">Aller/Retour simple + hotel</option>
                </select>
                <br>
                <?php
                if(isset($_GET['type_circuit']) && ($_GET['type_circuit']==1)){
                echo '<span class="red">Choisir le type de circuit !</span>'; 
                }
                ?>
                <div class="mb-3">
                <label class="form-label"><b>Image: *</b></label>
                <input class="form-control" type="file" maxlength="30" name="image" id="email" placeholder="monadresse@.....">

                </div>

                <div class="text-center">

                <button class="btn btn-primary" name="envoyer" type="submit" id="valider">Envoyer</button>
                </div>
             </fieldset>
        </form>
    </section>
</main>

<script>
    let Valider = document.getElementById('valider');
    Valider.addEventListener('submit', function(e){
        alert('inscription enregistrée')
    })
</script>

<?php
include 'include/footer.php';

?>