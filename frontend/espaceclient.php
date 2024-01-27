
<?php 

$Title='Espace Client,Afrique Centrale Découverte';

include 'include-frontend/header.php';
/*
if(array_key_exists('connexion',$_POST['connexion'])){

    
}
    //Récupérer les données du formulaire de connexion

    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars ($_POST['password']);

    //verifier si l'email existe en base

    $query = "SELECT * FROM user WHERE email = :email";
    $verifEmail = $pdo->prepare($query);
    $verifEmail->bindParam(':email', $email);
    $verifEmail->execute();
    */
?>


    <h1 class="text-center"><b>Accéder ou Créer mon Compte</b></h1>
    <br>
     <main class="container connexion">

        <section>

            <form class="form" method="POST" action="">  
                <fieldset>
                    <legend>Identifiez-vous, pour profiter de nos differents services.</legend> 
                            <div class="input-row">
                            <label class="form-label" for="name">Nom / Email : *</label>
                            <input class="form-control form-control-sm" type="email" name="email" id="email" placeholder="Dupont">
                            <?php
                                if(isset($_GET['email']) && ($_GET['email']==1)){
                                echo '<span><font color="red">Votre email est obligatoire</font></span>';
                                }
                            ?>
                            </div>
                            
                            <div class="input-row">
                            <label class="form-label" for="password">Password: *</label>
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
                            Nouveau? <a href="inscription.php"> Inscrivez-vous d'abord!</a>
                            <p style = color:red; id="erreur">
                            <br><b>Mot de pass oublié?</b><span>Réinitialiser mot de pass.</span> 

                </fieldset>
            </form> 
        <section>      
     </main>

<!--footer-->

<?php 

include 'include-frontend/footer.php'; 


?> 
          
     


