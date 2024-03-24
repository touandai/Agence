<?php
session_start();

$Title='Avis clients, Afrique Centrale Découverte';

require 'include-frontend/header.php';
require 'connexion.php';

if(array_key_exists('valider',$_POST)){

        if(isset($_POST['note']) && empty($_POST['note'])){
        header("location:?note=1");
        exit();
        }
        if(isset($_POST['commentaire']) && empty($_POST['commentaire'])){
        header("location:?commentaire=1");
        exit();
        }

     //fonction de validation des données contre les inections de type XSS
     function validationDonnees($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        
        return $donnees;
        }
        
        $nom = validationDonnees($_POST['nom']);
        $note = validationDonnees($_POST['note']);
        $commentaire= htmlspecialchars($_POST['commentaire']);
        $id_client = validationDonnees($_SESSION["donnees_client"]['id']);
        
        $reqInsert = 'INSERT INTO agence.avis (nom, note, message, date_avis, statut, id_client)
        values (:nom, :note, :message, :date, :statut, :id_client)';
        
        $insert = $conn -> prepare ($reqInsert);
        $insert->bindValue(':id_client',$id_client);
        $save = $insert-> execute([
                 
            ":nom" => $nom,
            ":note" => $note,
            ":message" => $commentaire,
            ":date" => date('Y-m-d h:m:s'),
            ":statut" => "En attente de validation",
            ":id_client" => $id_client,
        ]);

        header("location:succes-validation.php");
   
}

?>



<h1 class="text-center"><b>Avis</b></h1>


<main class="container avis">

        <section id="dropdownMenuButton" data-toggle="dropdown">     
                <form class="form" method="POST" id="myform" action="">
                       <fieldset>
                            <legend>Laissez-nous votre avis</legend>
                                <div class="p-2">
                                    <label class="form-label" for="name"><b>Pseudo:*</b></label>
                                    <input class="form-control" type="text" name="nom" id="pseudo" placeholder="Martin" maxlength="12"/>
                                    <span id="erreur"></span>
                                </div>

                                <div class="p-2">
                                    <label class="form-label" for="note"><b>Note :*</b></label>
                                    <input class="form-control" type="number" id="note" min="0" max="10" name="note" placeholder="Choisir entre 0 et 10"/>
                                    <?php
                                        if(isset($_GET['note']) && ($_GET['note']==1)){
                                        echo '<span class="red"> Veuillez choisir une note </span>';
                                        }
                                    ?>
                                    <span id="erreur2"></span>
                                </div>
                                <div class="p-2">
                                    <label class="form-label" for="commentaire"><b>Commentaire :*</b></label>
                                    <textarea class="form-control"  name="commentaire" id="commentaire" placeholder="votre message ici"></textarea>
                                    <span id="erreur3"></span>
                                    <?php
                                    if(isset($_GET['commentaire']) && ($_GET['commentaire']==1)){
                                    echo '<span class="red"> Champ obligatoire! </span>';
                                    }
                                    ?>
                               </div>
                               <br>

                               <div class="text-center">
                                <button class="btn btn-secondary" id="valider" name="valider" type="submit">Valider</button>
                               </div>
                        </fieldset>
                </form> 
        </section>

</main>

<?php
require 'connexion.php';

?>
<?php
require 'include-frontend/footer.php';

?>