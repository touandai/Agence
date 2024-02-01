<?php 
$Title='Inscriptions, Afrique Centrale Découverte';

require 'include-frontend/header.php';
require 'connexion.php';



if(array_key_exists('envoyer',$_POST)){

            if(isset($_POST['civilite']) && empty($_POST['civilite'])){
            header("location:?civilite=1");
            exit();
            }
            if(isset($_POST['nom']) && empty($_POST['nom'])){     
            header("location:?nom=1");
            exit();
            }
            if(isset($_POST['prenom']) && empty($_POST['prenom'])){   
            header("location:?prenom=1");
            exit();            
            }
            if(isset($_POST['age']) && empty($_POST['age'])){   
            header("location:?age=1");
            exit();             
            }
            if(isset($_POST['nationalite']) && empty($_POST['nationalite'])){     
                header("location:?nationalite=1");
                exit();
                    
            }
            if(isset($_POST['telephone']) && empty($_POST['telephone'])){   
                header("location:?telephone=1");
                exit();             
            }
            if(isset($_POST['email']) && empty($_POST['email'])){     
            header("location:?email=1");
            exit();  
           }
            if(isset($_POST['pwd']) && empty($_POST['pwd'])){   
            header("location:?pwd=1");
            exit();            
            }
    

        

         function validation_donnees($donnees){

            $donnees = trim($donnees);
            $donnees = stripslashes($donnees);
            $donnees = htmlspecialchars($donnees);

            return $donnees;
        }
            $civilite = validation_donnees($_POST['civilite']);
            $nom = validation_donnees($_POST['nom']);
            $prenom = validation_donnees($_POST['prenom']);
            $datenaiss = validation_donnees($_POST['datenaiss']);
            $nationalite = validation_donnees($_POST['nationalite']);
            $telephone = validation_donnees($_POST['telephone']);
            $email = validation_donnees($_POST['email']);
            $pwd = validation_donnees($_POST['pwd']);



            function validateDate($date, $format = 'Y-m-d'){
                $dt = DateTime::createFromFormat($format, $date);
                return $dt && $dt->format($format) == $date;

            }
            

           
            $InsertClient ='INSERT INTO agence.client(civilite nom, prenom, date_naissance, nationalite, telephone, email, mot_de_pass, date_inscription)
            values (:civilite, :nom, :prenom, :datenaiss, :nationalite, :telephone, :email, :pwd, :date)';

            $reqInsertion = $conn -> prepare ($InsertClient);
            $save = $reqInsertion->execute([
            
            ":civilite" => $civilite,
            ":nom" => $nom,   
            ":prenom" => $prenom,
            ":date_naissance" => $datenaiss,
            ":nationalite" => $nationalite,
            ":telephone" => $telephone,
            ":email" => $email,   
            ":pwd" => $pwd,        
            ":date" =>date('Y-m-d h:m:s'),

            ]);

}

?>

<h1 class="text-center"><b>Formulaire d'inscription</b></h1>

<main class="container inscription">

    <section>

        <form method="POST" action="">

            <fieldset>
                 <legend>Je m'inscris pour profiter des offres !</legend>   

                    <div class="mb-3">
                        <label class="form-label"><b> Civilité : *</b></label>

                        <select class="form-control" name="civilite" id="civilite">
                                        <option value="">-- indiquer votre civilité --</option>
                                        <option value="1">Monsieur</option>
                                        <option value="2">Madame</option>
                        </select> 
                        <?php
                        if(isset($_GET['civilite']) && ($_GET['civilite']==1)){
                        echo '<span class="red"> Veuillez indiquer votre civilité </span>';
                        }
                        ?>
                    </div> 

                    <div class="mb-3">
                        <label class="form-label"><b>Nom : *</b></label>
                        <input class="form-control" type="text" name="nom" maxlength="15" placeholder="Dupont">
                        <?php
                        if(isset($_GET['nom']) && ($_GET['nom']==1)){
                        echo '<span class="red"> Veuillez saisir votre nom </span>';
                        }
                        ?>
                    </div>  

                    <div class="mb-3">
                        <label class="form-label"><b> Prenom : *</b></label>
                        <input class="form-control" type="text" name="prenom" maxlength="15" placeholder="Olivier">
                        <?php
                        if(isset($_GET['prenom']) && ($_GET['prenom']==1)){
                        echo '<span class="red"> Veuillez saisir votre prenom </span>';
                        }
                        ?>
                    </div> 

                    <div class="mb-3">
                        <label class="form-label"><b> Date de naissance : *</b></label>
                        <input class="form-control" type="date" name="datenaiss" min ="1934-01-01" max="2005-01-01">
                        <?php
                        if(isset($_GET['datenaiss']) && ($_GET['datenaiss']==1)){
                        echo '<span class="red"> Veuillez indiquer votre date de Naissance </span>';
                        }
                        ?>
                    </div> 

                    <div class="mb-3">
                    <label class="form-label"><b> Nationalité: *</b></label>
                            <input  class="form-control form-control-sm" type="text" name="nationalite" maxlength="15" placeholder="Congolais">
                        <?php
                        if(isset($_GET['nationalite']) && ($_GET['nationalite']==1)){
                        echo '<span class="red"> Veuillez indiquer votre nationalité! </span>';
                        }
                        else{
                            
                        }
                        ?>
                    </div>

                    <div class="mb-3">
                    <label class="form-label"><b> Telephone: *</b></label>
                            <input  class="form-control form-control-sm" type="tel" name="telephone" maxlength="15">
                        <?php
                        if(isset($_GET['telephone']) && ($_GET['telephone']==1)){
                        echo '<span class="red"> Veuillez saisir votre numero de telephone! </span>';
                        }
                        else{
                            
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>E-mail: *</b></label>
                        <input class="form-control" type="email" name="email" maxlength="20" ="email" placeholder="monadresse@.. ">
                        <?php
                        if(isset($_GET['email']) && ($_GET['email']==1)){
                        echo '<span class="red"> Veuillez saisir votre Email ! </span>';
                        }
                        ?>
                    </div>

                    <div class="mb-3">
                    <label class="form-label"><b>Mot de pass: *</b></label>
                            <input  class="form-control form-control-sm" type="password" name="pwd" minlength="8" maxlength="15" id="pwd" placeholder="mot de pass">
                        <?php
                        if(isset($_GET['pwd']) && ($_GET['pwd']==1)){
                        echo '<span class="red"> Veuillez enregistrer un mot de pass ! </span>';
                        }
                        else{
                            
                        }
                        ?>
                    </div>


                    <div class="text-center">
                        <button class="btn btn-primary" name="envoyer" type="submit" id="envoyer">Envoyer</button>
                    </div>
            </fieldset>
        </form>  
    </section>  
</main>





<?php
include 'include-frontend/footer.php';

?>