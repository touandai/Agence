<?php
$Title='Modification mot de pass, Afrique Centrale Découverte';
require 'include-frontend/header.php';
require 'connexion.php';


    if(array_key_exists('envoyer',$_POST)){

            if(isset($_POST['email']) && empty($_POST['email'])){
            header("location:?email=1");
            exit();
            }
         function validationDonnees($donnees){

            $donnees = trim($donnees);
            $donnees = stripslashes($donnees);
            $donnees = htmlspecialchars($donnees);

            return $donnees;
            }

            $password1 = validationDonnees($_POST['email']);
            header("location:succes-validation.php");
    }
?>

<h1 class="text-center"><b>Mot de pass oublié </b></h1>

<main class="container inscription">
    <section>
        <form method="POST" action="">
                    <div class="row mb-3">
                       
                            <div class="col">
                                <p class="text-center">Veuillez saisir l'adresse email liée à votre compte </p>
                                <div class="modifemail">
                                <span id="erreuremail"></span>
                                    <?php
                                    if(isset($_GET['email'])){
                                        echo '<span class="red"> Veuillez saisir votre adresse email </span>';
                                    }
                                    ?>
                                    <input type="email" name="email" id="email" maxlength="15">
                                    <button name="envoyer" type="submit"><b>Réinitialisé le mot de passe.</b></button>
                                   
                                <div>
                            </div>
                    </div>
        </form>
    </section>
</main>


<?php
require "include-frontend/footer.php";

?>