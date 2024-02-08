
<?php 

$Title='Espace Client,Afrique Centrale Découverte';

include 'include-frontend/header.php';

require 'connexion.php';


    if(array_key_exists('connexion',$_POST)){
        
        //vérification des champs s'ils existent et sont renseignés ou pas 

        if(isset($_POST['email']) && empty($_POST['email'])){
            //var_dump($_POST);die;
            header("location:?email=1");
            exit();
        }
        if(isset($_POST['mot_de_pass']) && empty($_POST['mot_de_pass'])){
                header("location:?password=1");
             exit();
        }
    
                //Récupérer les données du formulaire de connexion


                //verifier si email et mot de pass existe en base de données

                $reqSelect = 'SELECT * FROM agence.client WHERE email = :email AND mot_de_pass = :mot_de_pass';
                $reqExec = $conn -> prepare($reqSelect);
                
                $reqExec-> execute ([

                    ":email"  => $_POST['email'],
                    ":mot_de_pass" => $_POST['mot_de_pass'],
                    
                    ]);

                $client = $reqExec ->fetch();
                    
                    if(!empty($client)){
                        $_SESSION['donnees_client'] = $client; 
                        header("location:dashbord-user.php");
                    }  else{
                        header("location:?erreur=1");
                    }
                    $echec="Ce compte n'existe pas, inscrivez-vous d'abord !";
                    if (empty($client)){
                        $_SESSION['echec'] = $echec;
                        header("location:?nouveau=1");
                        
                    }

   }

?>
    <?php

    if(isset($_SESSION['donnees_client'])) {
    echo "Bonjour " .$_SESSION['donnees_client']['nom']. ", vous êtes bien connecté.";
    }

    ?>
  
    <h1 class="text-center"><b>Accéder à mon Compte</b></h1>
    <br>
    
     <main class="container connexion">

        <section>

            <form class="form" method="POST" action="">  
                <fieldset>
                    <legend>Identifiez-vous, pour profiter de nos differents services!</legend> 
                            
                            <div class="input-row">
                            <label class="form-label" for="email"><b> Email : *</b></label>
                            <input class="form-control form-control" type="email" name="email" maxlength="25" placeholder="Dupont">
                            <?php
                                if(isset($_GET['email']) && ($_GET['email']==1)){
                                echo '<span><font color="red">Votre email est obligatoire</font></span>';
                                }
                            ?>
                            </div>
                            
                            <div class="input-row">
                            <label class="form-label" for="mot_de_pass"><b>Mot de pass : *</b></label>
                            <input  class="form-control form-control" type="password" name="mot_de_pass" minlength="8" maxlength="15" placeholder="mot de pass">
                            <?php
                                if(isset($_GET['mot_de_pass']) && ($_GET['mot_de_pass']==1)){
                                echo '<span><font color="red">Le mot de pass est obligatoire</font></span>';
                                }
                            ?>                   
                            </div>
                            <br>

                            <div class="text-center">

                            <button class="btn btn-primary" name="connexion" type="submit">Connexion</button>
                            <br><br>
                            <?php if(isset($_GET['nouveau']) && ($_GET['nouveau']==1)){
                            echo "<span><font color='red'>Compte introuvable </font></span>";
                            }
                            ?>
                            </div>

                            <div class="text-center">
                            <b>Nouveau? </b> <a class="lien" href="inscription.php"> Inscrivez-vous d'abord!</a>
                            <p id="erreur">
                            
                            <br><b>Mot de pass oublié?</b> Réinitialiser mot de pass.</p>
                            </div>
                </fieldset>
            </form> 
        <section>      
     </main>

<!--footer-->

<?php 

include 'include-frontend/footer.php'; 


?> 
        