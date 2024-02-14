<?php 
$Title='Modification mot de pass, Afrique Centrale Découverte';

require 'include-frontend/header.php';

require 'connexion.php';



if(array_key_exists('envoyer',$_POST)){

            if(isset($_POST['mot_de_pass']) && empty($_POST['mot_de_pass'])){
            header("location:?mot_de_pass=1");
            exit();
            }
            if(isset($_POST['mot_de_pass']) && empty($_POST['mot_de_pass'])){     
            header("location:?mot_de_pass=1");
            exit();
            }
           
         function validation_donnees($donnees){

            $donnees = trim($donnees);
            $donnees = stripslashes($donnees);
            $donnees = htmlspecialchars($donnees);

            return $donnees;
        }

            $password1 = validation_donnees($_POST['mot_de_pass']);
            $password2 = validation_donnees($_POST['mot_de_pass']);

           

             // verification email en base de données //
             /*
                $verifEmail = 'SELECT * FROM client WHERE email = :email';
                $conn -> prepare($verifEmail);
                $result = $conn -> bindParam(':email', $email);
                $verifEmail -> execute();
                */
                        

                       
            $modifPassword = 'UPDATE agence.client SET client.mot_de_pass, date_modification
            values (:mot_de_pass, :mot_de_pass, :date)';

            

            $save = $conn -> prepare ($modifPassword);
            $save  ->execute([
            
            ":mot_de_pass" => $mot_de_pass,
            ":confirmation" => $confirmation,   
      
            ":date" =>date('Y-m-d h:m:s'),

            ]);
            header('location:espaceclient.php');

}

?>

<h1 class="text-center"><b>Modification de mot de pass</b></h1>

<main class="container inscription">

    <section>

        <form method="POST" action="">

            <fieldset>
                 <legend>Je modifie mon mot de pass !</legend>   


                    <div class="row mb-3">

                            <div class="col">
                                <label class="form-label"><b>Nouveau mot de pass : *</b></label>
                                <input class="form-control" type="password" name="mot_de_pass" maxlength="15" placeholder="Dupont">
                                <?php
                                if(isset($_GET['mot_de_pass']) && ($_GET['mot_de_pass']==1)){
                                echo '<span class="red"> Veuillez saisir votre nouveau mot de pass </span>';
                                }
                                ?>   
                            </div>  
                    </div>         
                    <div class="row mb-3">
                            <div class="col">
                                <label class="form-label"><b>Confirmation mot de pass : *</b></label>
                                <input class="form-control" type="password" name="mot_de_pass" maxlength="15" placeholder="Olivier">
                                <?php
                                if(isset($_GET['mot_de_pass']) && ($_GET['mot_de_pass']==1)){
                                echo '<span class="red"> Veuillez confirmer votre mot de pass </span>';
                                }
                                ?>
                            </div>
                    </div>     
                    <br>
                            <div class="text-center">
                                <button class="btn btn-primary" name="valider" type="submit" id="envoyer">Valider</button>
                            </div>
            </fieldset>
        </form>  
    </section>  
</main>




<script>

    
</script>
<?php
include 'include-frontend/footer.php';

?>