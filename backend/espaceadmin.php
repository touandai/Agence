<?php 

//demarage session // 
$Title='Espace Admin, Afrique Centrale Découverte';
session_start();
require 'include/header.php';
require 'include/entete.php';
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

            $reqSelect = 'SELECT * FROM agence.user WHERE email = :email';
            
            $reqExec = $conn -> prepare($reqSelect);
            $reqExec -> bindvalue('email', $email);

            $reqExec-> execute ([
                ":email"  => $_POST['email'],                 
                ]);

            $user = $reqExec ->fetch(PDO::FETCH_ASSOC);
       
            
             // verification email base données  //
            if(!empty($user)){
                 //client trouvé //
                 $_SESSION['donnees_user'] = $user;
                $passwordhash = $user['mot_de_pass'];
                if(password_verify($password, $passwordhash)){
                    //client trouvé mot de pass correcte
                    header("location:tableau-de-bord.php");
                    exit();
                }
                else{
                    //client trouvé Mot de pass incorrect//
                    header("location:?erreurpassword=1");
                }                        
            }else{
                //l'adresse email ne figure pas en base de données//
                header("location:?emailintrouvable=1");
            }

    }      

?>

    <h1 class="text-center">Espace d'administration</h1>

     <main class="container connexion">

        <section>

            <form class="form" method="POST" action="">  
                <fieldset>
                    <legend>Identification !</legend> 

                            <div class="input-row">
                            <label class="form-label" for="name"><b> Email : *</b></label>
                            <input class="form-control form-control" type="email" name="email" id="email" maxlength="25">
                            <?php
                                if(isset($_GET['email']) && ($_GET['email']==1)){
                                echo '<span><font color="red">Votre email est obligatoire</font></span>';
                                }
                            ?>
                            </div>
                            
                            <div class="input-row">
                            <label class="form-label" for="password"><b> Mot de pass: *</b></label>
                            <input class="form-control form-control" type="password" name="mot_de_pass" id="password">
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
                            <b>Inscription?</b> <a href="inscription.php">Je m'inscrit" </a>
                            <p style = color:red; id="erreur">

                </fieldset>
            </form> 
        <section>      
     </main>

<!--footer-->
<?php
include 'include/footer.php';

?>

     


