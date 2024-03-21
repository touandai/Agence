<?php 
//demarage session // 
session_start();
if(isset($_SESSION['donnees_client'])){
    header("location:pages/tableau-de-bord-client.php");
    exit();
}
$Title='Espace Client,Afrique Centrale Découverte';

require 'include-frontend/header.php';

require 'connexion.php';


    if(array_key_exists('connexion',$_POST)){
        
        //vérification des champs s'ils existent et sont renseignés ou pas 

        if(isset($_POST['email']) && empty($_POST['email'])){
        header("location:?email=1");
        exit();
        }
        if(isset($_POST['mot_de_pass']) && empty($_POST['mot_de_pass'])){
        header("location:?pwd=1");
        exit();
        }
                    $email = $_POST['email'];
                    $password = $_POST['mot_de_pass'];

                    //verifier si email existe en base de données //

                    $reqSelect = 'SELECT * FROM agence.clients WHERE email = :email';
                    
                    $reqExec = $conn -> prepare($reqSelect);
                    $reqExec -> bindvalue('email', $email);
        
                    $reqExec-> execute ([
                        ":email"  => $_POST['email'],                 
                        ]);
                    $emailExist = $reqExec ->fetch(PDO::FETCH_ASSOC);
                    
                    // verification email base données  //
                     //client trouvé email correct //
                    if(!empty($emailExist)){ 
                            //client trouvé//
                        $passwordhash = $emailExist['mot_de_pass'];
                        
                        if(password_verify($password, $passwordhash)){
                            $_SESSION['donnees_client'] = $emailExist;
                            $emailExist =$clientConnecte;
                        header("location:pages/tableau-de-bord-client.php");
                        exit();
                        }
                        else{
                            //client trouvé mais mot de pass incorrect//
                            header("location:?erreurpassword=1");die;
                            }                        
                    }else{
                    //l'adresse email ne figure pas en base de données//
                    header("location:?emailintrouvable=1");die;
                    }
                        
                       // $_SESSION['donnees_client'] = $client;
                       // $passwordhash = $client['mot_de_pass'];
    } 

?>

<h1 class="text-center"><b>Accéder à mon Compte</b></h1>
    
    
     <main class="container connexion">

        <section>

            <form class="form" method="POST" action="">  
                <fieldset>
                    <legend>Merci de vous Identifier, pour profiter de nos services!</legend> 
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
                            <label class="form-label" for="mot_de_pass"><b> Mot de passe : *</b></label>
                            <input  class="form-control form-control" type="password" name="mot_de_pass" minlength="8" maxlength="15" placeholder="Mot de pass">
                            <?php
                                if(isset($_GET['pwd']) && ($_GET['pwd']==1)){
                                echo '<span><font color="red">Veuillez saisir votre mot de passe</font></span>';
                                }else if (isset($_GET['erreurpassword']) && ($_GET['erreurpassword']==1)){
                                echo '<span><font color="red">Identifiant ou mot de passe incorrect ! </font></span>';
                                }
                            ?>                   
                            </div>
                            <br>
                            <div class="text-center">
                            <button class="btn btn-primary" name="connexion" type="submit">Connexion</button>
                            <br><br>
                            <?php if(isset($_GET['emailintrouvable']) && ($_GET['emailintrouvable']==1)){
                            echo "<span><font color='red'>Ce compte n'existe pas ! </font></span>";
                            }
                            ?>
                            </div>

                            <div class="text-center">
                            <b>Nouveau? </b> <a class="lien" href="inscription.php"> Inscrivez-vous d'abord!</a>
                            <p id="erreur">
                            
                            <br><b>Mot de passe oublié?</b> <a href="modification-password.php">Réinitialiser mot de pass.</a></p>
                            </div>
                </fieldset>
            </form> 
        <section>      
     </main>

<!--footer-->

<?php 

include 'include-frontend/footer.php'; 


?> 
        