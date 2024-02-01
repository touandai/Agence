
<?php 

$Title='Espace Client,Afrique Centrale Découverte';

include 'include-frontend/header.php';
require 'connexion.php';


    if(array_key_exists('connexion',$_POST)){
        if(isset($_POST['email']) && empty($_POST['email'])){
            //var_dump($_POST);die;
            header("location:?email=1");
            exit();
        }
        if(isset($_POST['password']) && empty($_POST['password'])){
                header("location:?password=1");
             exit();
        }
    
                //Récupérer les données du formulaire de connexion

                //verifier si l'email existe en base

                $reqSelect= "SELECT * FROM user WHERE email = :email";
                $verifEmail = $conn -> prepare($reqSelect);

                $verifEmail->bindParam(':email', $email);
                $connect = $verifEmail->execute();


                $verifEmail -> execute ([
                    ":email"  =>$_POST['email'],
                    ":password" =>$_POST['password'],
                  ]);


                    $user = $verifEmail ->fetch();
                    if(!empty($user)){
                        $_SESSION['user_data'] = $user; 
                        //header("location:?connexion=success");
                        header("location:?page=tableau-de-bord");
                    }  else{
                        header("location:?erreur=1");
                    }
                    $echec="ce compte n'existe pas, enregistrer-vous d'abord";
                    if (empty($user)){
                        $_SESSION['echec'] = $echec;
                        header("location:?nouveau=1");

                    }

   }

?>




    <h1 class="text-center"><b>Accéder à mon Compte</b></h1>
    <br>
     <main class="container connexion">

        <section>

            <form class="form" method="POST" action="">  
                <fieldset>
                    <legend>Identifiez-vous, pour profiter de nos differents services.</legend> 
                            <div class="input-row">
                            <label class="form-label" for="name"><b>Nom / Email : *</b></label>
                            <input class="form-control form-control-sm" type="email" name="email" id="email" placeholder="Dupont">
                            <?php
                                if(isset($_GET['email']) && ($_GET['email']==1)){
                                echo '<span><font color="red">Votre email est obligatoire</font></span>';
                                }
                            ?>
                            </div>
                            
                            <div class="input-row">
                            <label class="form-label" for="password"><b>Password: *</b></label>
                            <input  class="form-control form-control-sm" type="password" name="password" id="password" placeholder="mot de pass">
                            <?php
                                if(isset($_GET['pwd']) && ($_GET['pwd']==1)){
                                echo '<span><font color="red">Le mot de pass est obligatoire</font></span>';
                                }
                            ?>                   
                            </div>
                            <br>

                            <div class="text-center">

                            <button class="btn btn-primary" name="connexion" type="submit">Connexion</button>
                            <b>Nouveau? </b><a class="lien" href="inscription.php"> Inscrivez-vous d'abord!</a>
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
        