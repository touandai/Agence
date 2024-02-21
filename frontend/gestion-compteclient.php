<?php
//demarrage session//

$Title='Modification informations personnelles, Afrique Centrale Découverte';

require 'tableau-de-bord-menu.php';
require 'connexion.php';

?>

<h1 class="text-center"><b>Modifier mes informations personnelles</b></h1>

<?php

    $reqaffich = 'SELECT nom, prenom, telephone, ville , mot_de_pass FROM agence.client where id=:id'


?>

<main class="container">

    <section>

        <form method="POST" action="">

            <fieldset>
                 <legend>Mise à jour des données</legend>   

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

                    <div class="row mb-3">

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
                        <div class="col">
                            <label class="form-label"><b> Ville: *</b></label>
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
                            <label class="form-label"><b>Mot de pass: *</b></label>
                            <input  class="form-control form-control" type="password" name="pwd" id="password" minlength="8" maxlength="15" id="pwd" placeholder="mot de pass">
                            <?php
                            if(isset($_GET['pwd']) && ($_GET['pwd']==1)){
                            echo '<span id="erreur5" class="red"> Veuillez enregistrer un mot de pass ! </span>';
                            }
                            ?>
                        </div>
                    </div>
                    <br>
                    <div class="text-center">
                        <button class="btn btn-primary" name="envoyer" type="submit" id="envoyer">Valider mes modifications</button>
                    </div>
            </fieldset>
        </form>  
    </section>  


</main>

<aside class="container">

        <div class="col text-center">  
            <a class="lien sous-titre" href="avis.php" >Je laisse mon avis</a>
        </div>

</aside>

<?php
require 'include-frontend/footer.php';

?>