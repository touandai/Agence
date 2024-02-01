
<?php 
$Title='Espace Admin, Afrique Centrale Découverte';

require 'include/entete.php';
require 'pages/connexion.php';


if(isset($_SESSION['user_data'])) {
    header('location:?page=tableau-de-bord');
  }
            //Récupérer les données du formulaire de connexion
            //verifier si l'email existe en base
/*
            $query = "SELECT * FROM user WHERE email = :email";
          
            $verifEmail = $pdo->prepare($query);
            $verifEmail->bindParam(':email', $email);
            $verifEmail->execute();
            */
?>
    <h1 class="text-center">Espace d'administration</h1>

     <main class="container connexion">

        <section>

            <form class="form" method="POST" action="">  
                <fieldset>
                    <legend>Merci de vous identifiez!</legend> 
                            <div class="input-row">
                            <label class="form-label" for="name"><b>Email : *</b></label>
                            <input class="form-control form-control-sm" type="email" name="email" id="email" placeholder="Dupont">
                            <?php
                                if(isset($_GET['email']) && ($_GET['email']==1)){
                                echo '<span><font color="red">Votre email est obligatoire</font></span>';
                                }
                            ?>
                            </div>
                            
                            <div class="input-row">
                            <label class="form-label" for="password"><b> Mot de pass: *</b></label>
                            <input  class="form-control form-control-sm" type="password" name="password" id="password" placeholder="mot de pass">
                            <?php
                                if(isset($_GET['pwd']) && ($_GET['pwd']==1)){
                                echo '<span><font color="red">Le mot de pass est obligatoire</font></span>';
                                }
                                if(isset($_GET['nouveau']) && ($_GET['nouveau']==1)){
                                    echo "<span><font color='red'>Vous n'êtes pas encore inscrit </font></span>";
                                    }
                            ?>                   
                            </div>
                            <br>
                            <button class="btn btn-primary" name="connexion" type="submit" id="connexion">Connexion</button>
                            <b>Mot de pass oublié?</b> <a href="#"> Réinitialisé mon mot de pass </a>
                            <p style = color:red; id="erreur">

                </fieldset>
            </form> 
        <section>      
     </main>

<!--footer-->
<?php
include 'include/footer.php';

?>

     


