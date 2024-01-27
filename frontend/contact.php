
<?php 
$Title='Contact, Afrique Centrale Découverte';
include 'include-frontend/header.php';

?>

<h1 class="text-center"><b>Contactez l'agence ?</b></h1>


<main class="container contact">

    <section>

        <form class="form" method="POST" action="">
            <fieldset>
                 <legend>Pour toutes vos question, vous pouvez nous envoyer votre message</legend>   

                   <div class="mb-3">

                        <label class="form-label">Type demande : *</label>
                        <select class="form-control" name="motif" id="motif">
                                <option value="0">-- Veuillez renseigner le type de votre demande --</option>
                                <option value="1">Informations</option>
                                <option value="2">Reclamation</option>
                        </select>    
                        <?php
                        if(isset($_GET['motif']) && ($_GET['motif']==1)){
                        echo '<strong> Veuillez indiquer le motif </strong>';
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
                        <label class="form-label">Telephone: *</label>
                        <input class="form-control" type="text" name="telephone" id="telephone" placeholder="+236....">
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