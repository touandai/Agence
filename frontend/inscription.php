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
            if(isset($_POST['tel']) && empty($_POST['tel'])){   
                header("location:?tel=1");
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
            $age = validation_donnees($_POST['age']);
            $nationalite = validation_donnees($_POST['nationalite']);
            $tel = validation_donnees($_POST['tel']);
            $email = validation_donnees($_POST['email']);
            $pwd = validation_donnees($_POST['pwd']);

             // hachage password // 
            $pwd = password_hash($_POST['pwd'], PASSWORD_BCRYPT);
           
                // verification email en base de données //
              
               $verifEmail = 'SELECT * FROM agence.client WHERE email = :email';
               $pdoStatement = $conn -> prepare($verifEmail);
               $pdoStatement -> bindValue(':email', $email);
               $result =  $pdoStatement -> execute ();
               
               if($result == true){
               header("location:?existe=1");
               } 
       
                    $InsertClient ='INSERT INTO agence.client(civilite, nom, prenom, age, nationalite, telephone, email, mot_de_pass, date_inscription)
                    values (:civilite, :nom, :prenom, :age, :nationalite, :tel, :email, :pwd, :date)';

                    
                    $reqInsertion = $conn -> prepare ($InsertClient);
                    $save = $reqInsertion->execute([
                    
                    ":civilite" => $civilite,
                    ":nom" => $nom,   
                    ":prenom" => $prenom,
                    ":age" =>$age,
                    ":nationalite" => $nationalite,
                    ":tel" => $tel,
                    ":email" => $email,   
                    ":pwd" => $pwd,        
                    ":date" =>date('Y-m-d h:m:s'),

                    ]);
                    header('location:succes-validation.php');

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
                                        <option value="">--Indiquer votre civilité--</option>
                                        <option value="Monsieur">Monsieur</option>
                                        <option value="Madame">Madame</option>
                        </select> 
                        <?php
                        if(isset($_GET['civilite']) && ($_GET['civilite']==1)){
                        echo '<span class="red"> Veuillez indiquer votre civilité </span>';
                        }
                        ?>
                    </div> 

                    <div class="row mb-3">
                            <div class="col">
                                <label class="form-label"><b>Nom : *</b></label>
                                <input class="form-control" type="text" name="nom" id="nom" maxlength="15">
                                <?php
                                if(isset($_GET['nom']) && ($_GET['nom']==1)){
                                echo '<span id="erreur" class="red"> Veuillez saisir votre nom </span>';
                                }
                                ?>   
                            </div>  

                            <div class="col">
                                <label class="form-label"><b> Prenom : *</b></label>
                                <input class="form-control" type="text" name="prenom" id="prenom" maxlength="15" placeholder="Isabelle">
                                <?php
                                if(isset($_GET['prenom']) && ($_GET['prenom']==1)){
                                echo '<span id="erreur2" class="red"> Veuillez saisir votre prenom </span>';
                                }
                                ?>
                            </div> 
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><b> Age : *</b></label>
                        <select class="form-control" name="age" id="age">
                                <option value="">--Votre age--</option>
                                <?php 
                                    for($i = 19; $i <= 60; $i++) {
                                    ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php
                                    }
                                    ?>  
                        </select>
                        <?php
                        if(isset($_GET['age']) && ($_GET['age']==1)){
                        echo '<span class="red"> Veuillez indiquer votre date de Naissance </span>';
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
                                echo '<span class="red"> Veuillez indiquer votre nationalité! </span>';
                                }
                                else{
                                    
                                }
                                ?>
                        </div>

                        <div class="col">
                            <label class="form-label"><b> Telephone: *</b></label>
                                    <input  class="form-control form-control" type="tel" name="tel" id="telephone" minlength="14" maxlength="14">
                                <?php
                                if(isset($_GET['tel']) && ($_GET['tel']==1)){
                                echo '<span id="erreur3" class="red"> Veuillez saisir votre numero de telephone! </span>';
                                }
                                else{
                                    
                                }
                                ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
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

                        <div class="col">
                            <label class="form-label"><b>Mot de passe: *</b></label>
                            <input  class="form-control form-control" type="password" name="pwd" id="password" minlength="8" maxlength="15" id="pwd" placeholder="mot de pass">
                            <?php
                            if(isset($_GET['pwd']) && ($_GET['pwd']==1)){
                            echo '<span id="erreur5" class="red"> Veuillez enregistrer un mot de passe ! </span>';
                            }
                            ?>
                        </div>
                    </div>
                    <br>
                    <div class="col text-center">
                        <button class="btn btn-primary" name="envoyer" type="submit" id="envoyer">Envoyer</button>
                    </div>
                    <br>
                    <div class="col text-center"> Déjà Inscrit(e)? <a class="lien" href="espaceclient.php"> <b>Connectez-vous </b></a>
                    </div>
            </fieldset>
        </form>  
    </section>  
</main>


<script>

    let Validation = document.getElementById('envoyer');
    
    Validation.addEventListener('submit',function(e){

        let inputNom = document.getElementById('nom')
        let inputPrenom = document.getElementById('prenom')
        let inputTel = document.getElementById('telephone')
        let inputEmail = document.getElementById('email')
        let inputPassword = document.getElementById('password')

        let myRegex = /^[a-zA-Z-]+$/; 
        let myRegex2 = /^[0-9]+$/; 
        let myRegex3 = /^[a-z-]+[0-9]{@}$/;
        let myRegex4 = /^[a-zA-Z0-9]+$/;

        if (myRegex.test(inputNom.value) == false){
        let Erreur = document.getElementById('erreur');
        Erreur.innerHTML ="Le Nom doit comporter uniquement de lettres et tirets";
        Erreur.style.color="red";
        e.preventDefault();
        }  
        if (myRegex.test(inputPrenom.value) == false){
        let Erreur2 = document.getElementById('erreur2');
        Erreur2.innerHTML ="Le Prénom doit comporter uniquement de lettres, espaces et tiret";
        Erreur2.style.color ='red';
        e.preventDefault();
        }
        if (myRegex2.test(inputTel.value) == false){
        let Erreur3 = document.getElementById('erreur3');
        Erreur3.innerHTML ="Ce champ doit composer uniquement de chiffre";
        Erreur3.style.color ='red';
        e.preventDefault();
        }
        if (myRegex3.test(inputEmail.value) == false){
        let Erreur4 = document.getElementById('erreur4');
        Erreur4.innerHTML ="Le nom doit composer que de lettres espace ni tiret";
        Erreur4.style.color ='red';
        e.preventDefault();
        }
        if (myRegex4.test(inputPassword.value) == false){
        let Erreur5 = document.getElementById('erreur5');
        Erreur5.innerHTML ="Le nom doit composer que de lettres espace ni tiret";
        Erreur5.style.color ='red';
        e.preventDefault();
        }       

    })    
    
</script>



<?php
include 'include-frontend/footer.php';

?>