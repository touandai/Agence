<?php
$Title='Avis clients, Afrique Centrale Découverte';

require 'include-frontend/header.php';
require 'connexion.php';


    if(array_key_exists('valider',$_POST)){
        
                if(isset($_POST['nom']) && empty($_POST['nom'])){     
                header("location:?nom=1");
                exit();
                }
                if(isset($_POST['note']) && empty($_POST['note'])){     
                header("location:?note=1");
                exit();
                }
                if(isset($_POST['commentaire']) && empty($_POST['commentaire'])){     
                header("location:?commentaire=1");
                exit();
                }

                    //fonction pour valider les données et éviter les inections de type XSS

                    function validation_donnees($donnees){

                        $donnees = trim($donnees);
                        $donnees = stripslashes($donnees);
                        $donnees = htmlspecialchars($donnees);
                        
                        return $donnees;
                        }
                        
                        $nom = validation_donnees($_POST['nom']);
                        $note = validation_donnees($_POST['note']);
                        $commentaire= validation_donnees($_POST['commentaire']);
                    

                        $reqInsert = 'INSERT INTO agence.avis(nom, note, message, date_avis ) 
                        values (:nom, :note, :message, :date)';

                        $insert = $conn -> prepare ($reqInsert);
                        $save = $insert-> execute([
                                 
                            ":nom" => $nom,   
                            ":note" => $note,
                            ":message" => $commentaire,
                            ":date" => date('Y-m-d h:m:s'),
                        ]);    
                        header("location:succes-validation.php");

    
    }           
    
    
?>



<h1 class="text-center"><b>Avis</b></h1> 


<main class="container avis">

        <section class="" id="dropdownMenuButton" data-toggle="dropdown">
                 
                <form class="form" method="POST" action="">
                                            
                       <fieldset>
                            <legend>Laissez-nous votre avis</legend>
                         
                                <div class="p-2">
                                    <label class="form-label"><b>Pseudo / Nom :*</b></label>
                                    <input class="form-control" type="text" name="nom" placeholdered="Martin" maxlength="15"/>
                                <?php 
                                if(isset($_GET['nom']) && ($_GET['nom']==1)){
                                echo '<span class="red"> Veuillez indiquer votre nom ! </span>';
                                }
                                ?>
                                </div>

                                <div class="p-2">
                                    <label class="form-label"><b>Note :*</b></label>
                                    <input class="form-control" type="number" min="0" max="10" name="note" placeholder="choisir une note entre 0 et 10"/>
                                <?php if(isset($_GET['note']) && ($_GET['note']==1)){
                                echo '<span class="red"> Veuillez choisir une note ! </span>';
                                }
                                ?>
                                </div>
                                <div class="p-2">
                                    <label class="form-label"><b>Commentaire :*</b></label>
                                    <textarea class="form-control"  name="commentaire" placeholder="votre message ici"></textarea>
                                <?php if(isset($_GET['commentaire']) && ($_GET['commentaire']==1)){
                                echo '<span class="red"> Veuillez saisir votre message ! </span>';
                                }
                                ?>
                               </div>
                               <br>

                               <div class="text-center">
                                <button class="btn btn-secondary" name="valider" type="submit">Valider</button>
                               </div>
                            
                        </fieldset>
                </form> 
        </section>

</main>

<?php
include 'include-frontend/footer.php';


?>