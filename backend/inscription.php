<?php  

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
    if(isset($_POST['pwd']) && empty($_POST['pwd'])){   
    header("location:?password=1");
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
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Agence de voyages">
    <title>Inscription Espace Admin, Afrique Centrale Découverte</title>
    <link rel="stylesheet" href="assets/bootstrap.icons.min.css">
    <link rel="stylesheet" href="../backend/assets/bootstrap.min.css">
    <link rel="stylesheet" href="../backend/assets/index.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="images/logo.png"/>
    </div>
    <div class="clear"></div>
</header>

</body>
</html>



<h1 class="text-center">Inscription Espace Admin </h1>

<main class="container inscription">

    <section>

        <form id="myform" method="POST" action="">

            <fieldset>
                 <legend>Inscrire un nouveau membre?  </legend>   


                            <div>
                                <label class="form-label"><b>Nom : *</b></label>
                                <input class="form-control" type="text" name="nom" id="nom" maxlength="15">
                                <span id="erreur1"></span>
                                <?php
                                if(isset($_GET['nom']) && ($_GET['nom']==1)){
                                echo '<strong class="red"> Veuillez saisir votre nom </strong>';
                                }
                                ?>   
                            </div>  

                            <div>
                                <label class="form-label"><b>E-mail: *</b></label>
                                <input class="form-control" type="email" name="email" id="email" maxlength="25" id="email" placeholder="adresse@.. ">
                                <span id="erreur2"></span>
                                <?php
                                if(isset($_GET['email']) && ($_GET['email']==1)){
                                echo '<strong class="red"> Veuillez saisir votre Email ! </strong>';
                                }else if (isset($_GET['existe']) && ($_GET['existe'] == 1)){
                                echo '<strong class="red"> Un compte existe déjà avec cet email, identifiez-vous ! </strong>';
                                }                               
                                ?>
                             </div>
                            <div>
                                <label class="form-label"><b>Mot de passe: *</b></label>
                                <input  class="form-control form-control" type="password" name="pwd" id="password" minlength="8" maxlength="15" id="pwd" placeholder="mot de pass">
                                <?php
                                if(isset($_GET['password']) && ($_GET['password']==1)){
                                echo '<strong> Veuillez enregistrer un mot de passe ! </strong>';
                                }
                                ?>
                             </div>
                             <br>
                            <div class="text-center">
                                <button class="btn btn-primary" name="envoyer" type="submit" id="envoyer">Envoyer</button>
                            </div>
                            <br>

                            <div class="col text-center"> Déjà Inscrit(e)? <a class="lien" href="espaceadmin.php"> <b>Connectez-vous!</b></a>
                            </div>
             </fieldset>
        </form>  
    </section>  
</main>



<script>
    let Myform = document.getElementById('myform');

    Myform.addEventListener('submit',function(e){

        let inputNom = document.getElementById('nom')
        let inputMail = document.getElementById('email')
        let myRegex = /^[a-zA-Z-\s]+$/;
        let myRegex2 = /^[a-zA-Z]+$/;

        if (inputNomgex.test(inputNom.value) =""){
            let Erreur1 = document.getElementById('erreur1');
            Erreur1.innerHTML ="Le nom doit composer uniquement de lettres, tirets et espace";
            Erreur1.style.color ='red';
            e.preventDefault();
        } 
        if (myRegex.test(inputNom.value) == false){
            let Erreur1 = document.getElementById('erreur1');
            Erreur1.innerHTML ="Le nom doit composer uniquement de lettres, tirets et espace";
            Erreur1.style.color ='red';
            e.preventDefault();
        }        
        if (myRegex2.test(inputMail.value) == false){
            let Erreur2 = document.getElementById('erreur2');
            Erreur2.innerHTML ="Le email ne respecte pas les caracteres autorisés";
            Erreur2.style.color ='red';
            e.preventDefault();
        } 
    }) 
    
</script>

<?php
include 'include/footer.php';

?>
