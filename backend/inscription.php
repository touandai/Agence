<?php 
//demarage session // 
$Title='Espace Admin, Afrique Centrale Découverte';

require 'include/entete.php';
require 'connexion.php';

if(array_key_exists('envoyer',$_POST)){


    if(isset($_POST['nom']) && empty($_POST['nom'])){     
    header("location:?nom=1");
    exit();
    }
    if(isset($_POST['email']) && empty($_POST['email'])){   
    header("location:?email=1");
    exit();            
    }
    if(isset($_POST['mot_de_pass']) && empty($_POST['mot_de_pass'])){   
    header("location:?password=1");
    exit();             
    }
    if(isset($_POST['date_inscription']) && empty($_POST['date_inscription'])){     
        header("location:?inscription=1");
        exit();   
    }


 function validation_donnees($donnees){

    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);

    return $donnees;
}

    $nom = validation_donnees($_POST['nom']);
    $email = validation_donnees($_POST['email']);
    $pwd = validation_donnees($_POST['pwd']);

     
    //validité adresse email//
  
    
     // hachage password // 
    $pwd = password_hash($_POST['pwd'], PASSWORD_BCRYPT);
   

        // verification email en base de données //
      
       $verifEmail = 'SELECT * FROM agence.user WHERE email = :email';
       $pdoStatement = $conn -> prepare($verifEmail);
       $pdoStatement -> bindValue(':email', $email);
       $result =  $pdoStatement -> execute ();
       
       if($result == true){
       header("location:?existe=1");
       } 

      
            $InsertClient ='INSERT INTO agence.user(nom, email, mot_de_pass, date_creation)
            values (:nom, :email, :pwd, :date)';

            
            $reqInsertion = $conn -> prepare ($InsertClient);
            $save = $reqInsertion->execute([
            
            ":nom" => $nom,   
            ":email" => $email,   
            ":pwd" => $pwd,        
            ":date" =>date('Y-m-d h:m:s'),

            ]);
            header('location:succes-validation.php');

}

?>



<h1 class="text-center"><b>Inscription Espace Admin </b></h1>

<main class="container inscription">

    <section>

        <form method="POST" action="">

            <fieldset>
                 <legend>Je m'inscris pour profiter des offres ! </legend>   


                            <div>
                                <label class="form-label"><b>Nom : *</b></label>
                                <input class="form-control" type="text" name="nom" id="nom" maxlength="15">
                                <?php
                                if(isset($_GET['nom']) && ($_GET['nom']==1)){
                                echo '<span id="erreur" class="red"> Veuillez saisir votre nom </span>';
                                }
                                ?>   
                            </div>  

                            <div>
                                <label class="form-label"><b>E-mail: *</b></label>
                                <input class="form-control" type="email" name="email" id="email" maxlength="25" id="email" placeholder="adresse@.. ">
                                <?php
                                if(isset($_GET['email']) && ($_GET['email']==1)){
                                echo '<span id="erreur4" class="red"> Veuillez saisir votre Email ! </span>';
                                }else if (isset($_GET['existe']) && ($_GET['existe'] == 1)){
                                echo '<span class="red"> Un compte existe déjà avec cet email, identifiez-vous ! </span>';
                                }
                                ?>
                             </div>

                            <div>
                                <label class="form-label"><b>Mot de pass: *</b></label>
                                <input  class="form-control form-control" type="password" name="pwd" id="password" minlength="8" maxlength="15" id="pwd" placeholder="mot de pass">
                                <?php
                                if(isset($_GET['pwd']) && ($_GET['pwd']==1)){
                                echo '<span id="erreur5" class="red"> Veuillez enregistrer un mot de pass ! </span>';
                                }
                                ?>
                             </div>
                             <br>
                            <div class="text-center">
                                <button class="btn btn-primary" name="envoyer" type="submit" id="envoyer">Envoyer</button>
                            </div>
                            <br>

                            <div class="col text-center"> Déjà Inscrit(e)? <a class="lien" href="espaceadmin.php"> <b>Connectez-vous </b></a>
                            </div>
             </fieldset>
        </form>  
    </section>  
</main>



<?php
include 'include/footer.php';

?>
