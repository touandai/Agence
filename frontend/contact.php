
<?php 
$Title='Contact, Afrique Centrale Découverte';
include 'include-frontend/header.php';

?>

<h1 class="text-center">Contactez l'agence ?</h1>


<main class="container contact">

    <section>

        <form class="form" method="POST" action="">
            <fieldset>
                 <legend>Pour toutes vos question, vous pouvez nous envoyer votre message</legend>   

                   <div class="mb-3">
                        <label class="form-label">Civilité : *</label>
                        <select class="form-control" name="civilite" id="civilite">
                                <option value="">-- civilite --</option>
                                <option value="1">Monsieur</option>
                                <option value="2">Madame</option>
                        </select>    
                        <?php
                        if(isset($_GET['civilite']) && ($_GET['civilite']==1)){
                        echo '<strong> Veuillez indiquer votre civilité </strong>';
                        }
                        ?>
                    </div>

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
                        <label class="form-label">Message: </label>
                        <textarea class="form-control" name="message" id="message"placeholder=" Ecrivez ici votre message..."></textarea>
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