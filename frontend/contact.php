<?php 
$Title='Contact, Afrique Centrale Découverte';

include 'include-frontend/header.php';
require 'connexion.php';



if(array_key_exists('envoyer',$_POST)){
             
           if(isset($_POST['motif']) && empty($_POST['motif'])){     
                header("location:?motif=1");
                exit();
                
                }
            if(isset($_POST['nom']) && empty($_POST['nom'])){   
                header("location:?nom=1");
                exit();            
                }

            if(isset($_POST['email']) && empty($_POST['email'])){   
                header("location:?email=1");
                exit();             
                }

            if(isset($_POST['message']) && empty($_POST['message'])){   
                header("location:?message=1");
                exit();             
                }
            
                //fonction pour valider les données et éviter les inections de type XSS

                function validation_donnees($donnees){

                    $donnees = trim($donnees);
                    $donnees = stripslashes($donnees);
                    $donnees = htmlspecialchars($donnees);

                    return $donnees;
                }
                
                    $motif = validation_donnees($_POST['motif']);
                    $nom = validation_donnees($_POST['nom']);
                    $email = validation_donnees($_POST['email']);
                    $telephone = validation_donnees($_POST['telephone']);
                    $message = validation_donnees($_POST['message']);
                                                 
                       
                                 $req='INSERT INTO agence.contacts(type_demande, nom, email, telephone, message, date_contact)
                                  values (:motif, :nom, :email, :telephone, :message, :date)';
                                 $reqInsertion = $conn -> prepare ($req);
                                 $enregister = $reqInsertion->execute([
                                 
                                 ":motif" => $motif,   
                                 ":nom" => $nom, //(empty($nom)) ? NULL : $nom,
                                 ":email" => $email,//(empty($email)) ? NULL : $email,
                                 ":telephone" => $telephone,
                                 ":message" => $message,
                                 ":date" =>date('Y-m-d h:m:s'),
                                 
                                 ]);

                                 header("location:succes-validation.php");

                        
   
          }
 ?>


<h1 class="text-center"><b>Contactez l'agence ?</b></h1>

<main class="container contact">

    <section>

        <form id="form" class="form" method="POST" action="">
            <fieldset>
                 <legend>Pour toutes vos questions, joignez-nous!</legend>   

                   <div class="mb-3">

                        <label class="form-label"><b>Type demande : *</b></label>
                        <select class="form-control" name="motif" id="motif">
                                <option value="">-- Veuillez renseigner le type de votre demande --</option>
                                <option value="Information">Information</option>
                                <option value="Reclamation">Reclamation</option>
                        </select>   
                        <span id="erreurtype"></span> 
                        <?php
                        if(isset($_GET['motif']) && ($_GET['motif']==1)){
                        echo '<span class="red"> Veuillez indiquer le type de demande</span>';
                        }
                        ?>

                    </div>

                    <div class="mb-3">
                        <label class="form-label"><b>Nom : *</b></label>
                        <input class="form-control" type="text" maxlength="15" name="nom" id="nom" placeholder="Dupont">
                        <span id="erreurname"></span> 
                        <?php
                        if(isset($_GET['nom']) && ($_GET['nom']==1)){
                        echo '<span class="red">Votre nom est obligatoire</span>';
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>E-mail: *</b></label>
                        <input class="form-control" type="email" maxlength="25" name="email" id="email" placeholder="monadresse@.....">
                        <span id="erreurmail"></span> 
                        <?php
                        if(isset($_GET['email']) && ($_GET['email']==1)){
                        echo '<span class="red">Veuillez saisir votre email</span>'; 
                        }
                        ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><b>Telephone:</b></label>
                        <input class="form-control" type="text" minlength="14" maxlength="15" name="telephone" id="tel" placeholder="+236....">
                        <span id="erreurtel"></span> 
                    </div>

                    <div class="mb-3 p-4">
                        <label class="form-label"><b>Message:*</b></label>
                        <textarea class="form-control" name="message" id="message" maxlength="1000" placeholder=" Ecrivez ici votre message..."></textarea>
                        <span id="erreurmessage"></span>
                        <?php
                        if(isset($_GET['message']) && ($_GET['message']==1)){
                        echo '<span class="red">Veuillez saisir votre message</span>';
                        }
                        ?>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary btn-lg" name="envoyer" type="submit" id="envoyer">Envoyer</button>
                    </div>
            </fieldset>
        </form>  
    </section>  
</main>



<?php
include 'include-frontend/footer.php';

?>

