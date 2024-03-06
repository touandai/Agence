<?php
$Title ="Ajout clients";

require 'include/header.php';
require 'include/entete.php';
require 'include/menu-nav.php';

require 'connexion.php';


if(array_key_exists('valider',$_POST)){

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
        $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);   
        header("location:?email=1");
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
        $age = validation_donnees($_POST['age']);
        $nationalite = validation_donnees($_POST['nationalite']);
        $telephone = validation_donnees($_POST['telephone']);
        $email = validation_donnees($_POST['email']);
        $pwd = validation_donnees($_POST['pwd']);

                
        $InsertClient ='INSERT INTO agence.client(civilite, nom, prenom, age, nationalite, telephone, email, mot_de_pass, date_inscription)
        values (:civilite, :nom, :prenom, :age, :nationalite, :telephone, :email, :pwd, :date)';

        //verification email //
        $verifEmail = 'SELECT * FROM agence.user WHERE email = :email';
        $pdoStatement = $conn -> prepare($verifEmail);
        $pdoStatement -> bindValue(':email', $email);
        $result =  $pdoStatement -> execute ();

        if($result == true){
        header("location:?existe=1");
        }  

        $reqInsertion = $conn -> prepare ($InsertClient);
        $save = $reqInsertion->execute([

        ":civilite" => $civilite,
        ":nom" => $nom,   
        ":prenom" => $prenom,
        ":age" =>$age,
        ":nationalite" => $nationalite,
        ":telephone" => $telephone,
        ":email" => $email,   
        ":pwd" => $pwd,        
        ":date" =>date('Y-m-d h:m:s'),

        ]);
        //header("location:succes-validation-admin.php");//
    }

?>

<main class="container">
 
<section class="container circuit">

<form id="ajoutclient" method="POST" action="">

    <fieldset>
         <legend>Ajouter des clients </legend>   

            <div class="mb-3">
                <label class="form-label"><b> Civilité : *</b></label>
                <select class="form-control" name="civilite" id="civilite">
                                <option value="">--Indiquer votre civilité--</option>
                                <option value="Monsieur">Monsieur</option>
                                <option value="Madame">Madame</option>
                </select> 
                <?php
                if(isset($_GET['civilite']) && ($_GET['civilite']==1)){
                echo '<span class="red"> Veuillez indiquer la civilité </span>';
                }
                ?>
            </div> 

            <div class="row mb-3">
                    <div class="col">
                        <label class="form-label"><b>Nom : *</b></label>
                        <input class="form-control" type="text" name="nom" maxlength="15" placeholder="Dupont">
                        <?php
                        if(isset($_GET['nom']) && ($_GET['nom']==1)){
                        echo '<span class="red"> Veuillez saisir le nom </span>';
                        }
                        ?>   
                    </div>  

                    <div class="col">
                        <label class="form-label"><b> Prenom : *</b></label>
                        <input class="form-control" type="text" name="prenom" maxlength="15" placeholder="Olivier">
                        <?php
                        if(isset($_GET['prenom']) && ($_GET['prenom']==1)){
                        echo '<span class="red"> Veuillez saisir le  prenom </span>';
                        }
                        ?>
                    </div> 
            </div>

            <div class="mb-3">
                <label class="form-label"><b> Age : *</b></label>
                <select class="form-control" name="age" id="age">
                        <option value="0">--Votre age--</option>
                        <?php 
                            for($i = 18; $i <= 70; $i++) {
                            ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php
                            }
                            ?>  
                </select>

                <?php
                if(isset($_GET['age']) && ($_GET['age']==1)){
                echo '<span class="red"> Veuillez indiquer une date de Naissance </span>';
                }
                ?>
            </div> 

            <div class="row mb-3">

                <div class="col">

                    <label class="form-label"><b> Nationalité: *</b></label>
                    <select class="form-control" name="nationalite">
                        <option value="0">--Votre Nationalité--</option>
                        <option value="Centrafricaine">Centrafricaine</option>
                        <option value="Gabonaise">Gabonaise</option>
                        <option value="Camerounaise">Camerounaise</option>
                        <option value="Tchadienne">Tchadienne</option>
                        <option value="Congolaise">Congolaise</option>
                    </select>
                        <?php
                        if(isset($_GET['nationalite']) && ($_GET['nationalite']==1)){
                        echo '<span class="red"> Veuillez indiquer la nationalité! </span>';
                        }
                        else{
                            
                        }
                        ?>
                </div>

                <div class="col">
                    <label class="form-label"><b> Telephone: *</b></label>
                            <input  class="form-control form-control-sm" type="tel" name="telephone" minlength="14" maxlength="14">
                        <?php
                        if(isset($_GET['telephone']) && ($_GET['telephone']==1)){
                        echo '<span class="red"> Veuillez saisir un numero de telephone! </span>';
                        }
                        else{
                            
                        }
                        ?>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label"><b>E-mail: *</b></label>
                    <input class="form-control" type="email" name="email" maxlength="20" ="email" placeholder="adresse@.. ">
                    <?php
                        if(isset($_GET['email']) && ($_GET['email']==1)){
                        echo '<strong class="red"> Veuillez saisir votre Email ! </strong>';
                        }else if (isset($_GET['existe']) && ($_GET['existe'] == 1)){
                        echo '<strong class="red"> Un compte existe déjà avec cet email! </strong>';
                        }                               
                        ?>
                </div>

                <div class="col">
                    <label class="form-label"><b>Mot de pass: *</b></label>
                    <input  class="form-control form-control" type="password" name="pwd" minlength="8" maxlength="15" id="pwd" placeholder="mot de pass">
                </div>
            </div>
            <br>

            <div class="text-center">
                <button class="btn btn-primary" name="valider" type="submit" id="envoyer">Envoyer</button>
            </div>
    </fieldset>
</form>  
</section>  


</main>





<script>
    let Valider = document.getElementById('valider');
    Envoyer.addEventListener('submit', function(e){
        alert('inscription enregistrée')
    })
</script>

<?php
include 'include/footer.php';

?>