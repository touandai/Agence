<?php 
$Title='Inscriptions, Afrique Centrale Découverte';

include 'include-frontend/header.php';

?>

<h1 class="text-center">Formulaire d'inscription</h1>

<main class="container inscription">

    <section>

        <form method="POST" action="">
            <fieldset>
                 <legend>Je m'inscris pour profiter des offres !</legend>   

                    <div class="mb-3">
                        <label class="form-label">Nom : *</label>
                        <input class="form-control" type="text" name="nom" id="name" placeholder="Dupont">
                        <?php
                        if(isset($_GET['nom']) && ($_GET['nom']==1)){
                        echo '<strong> Veuillez saisir votre nom </strong>';
                        }
                        ?>
                    <div class="mb-3">
                        <label class="form-label">E-mail: *</label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="monadresse@.....">
                        <?php
                        if(isset($_GET['email']) && ($_GET['email']==1)){
                        echo '<strong> Veuillez indiquer votre civilité </strong>';
                        }
                        ?>
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="password">Password: *</label>
                            <input  class="form-control form-control-sm" type="password" name="password" id="password" placeholder="mot de pass">
                        <?php
                        if(isset($_GET['message']) && ($_GET['message']==1)){
                        echo '<strong> Veuillez saisir un message </strong>';
                        }
                        else{
                            
                        }
                        ?>
                    </div>
                    
                        <button class="btn btn-primary" name="envoyer" type="submit" id="envoyer">Envoyer</button>
            </fieldset>
        </form>  
    </section>  
</main>





<?php
include 'include-frontend/footer.php';

?>