<?php
$Title ="Gérer les clients";

require 'include/header.php';
require 'include/entete.php';
require 'include/menu-nav.php';

require 'connexion.php';


if(array_key_exists('envoyer',$_POST)){

    if(isset($_POST['civilite']) && empty($_POST['civilite'])){
    header("location:?civilite=1");
    exit();
    }
    if(isset($_POST['nom']) && empty($_POST['nom'])){     
    header("location:?nom=1");
    exit();
    }
    if(isset($_POST['prenom']) && empty($_POST['prenom'])){   
    header("location:?prenom=1");
    exit();            
    }
    if(isset($_POST['age']) && empty($_POST['age'])){   
    header("location:?age=1");
    exit();             
    }
    if(isset($_POST['nationalite']) && empty($_POST['nationalite'])){     
        header("location:?nationalite=1");
        exit();
            
    }
    if(isset($_POST['telephone']) && empty($_POST['telephone'])){   
        header("location:?telephone=1");
        exit();             
    }
    if(isset($_POST['email']) && empty($_POST['email'])){  
    $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);   
    header("location:?email=1");
    exit();  
   }
    if(isset($_POST['pwd']) && empty($_POST['pwd'])){   
    header("location:?pwd=1");
    exit();            
    }
    
 function validation_donnees($donnees){

    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);

    return $donnees;
}

    $civilite = validation_donnees($_POST['civilite']);
    $nom = validation_donnees($_POST['nom']);
    $prenom = validation_donnees($_POST['prenom']);
    $age = validation_donnees($_POST['age']);
    $nationalite = validation_donnees($_POST['nationalite']);
    $telephone = validation_donnees($_POST['telephone']);
    $email = validation_donnees($_POST['email']);
    $pwd = validation_donnees($_POST['pwd']);
   
               
    $InsertClient ='INSERT INTO agence.client(civilite, nom, prenom, age, nationalite, telephone, email, mot_de_pass, date_inscription)
    values (:civilite, :nom, :prenom, :age, :nationalite, :telephone, :email, :pwd, :date_inscription)';

    /*verification email 
        $reqSelect = 'SELECT * FROM client WHERE email = :email';
        $verifEmail = $conn -> prepare($reqSelect);
        $verifEmail->bindParam(':email', $email);
        $verifEmail->execute();
     */   

    $reqInsertion = $conn -> prepare ($InsertClient);
    $save = $reqInsertion->execute([
    
    ":civilite" => $civilite,
    ":nom" => $nom,   
    ":prenom" => $prenom,
    ":age" =>$age,
    ":nationalite" => $nationalite,
    ":telephone" => $telephone,
    ":email" => $email,   
    ":pwd" => $pwd,        
    ":date" =>date('Y-m-d h:m:s'),

    ]);
    header('location:succes-validation.php');
}

?>
<br>
<h1 class="text-center">Gestion des Clients</h1>

<main class="contenaire content">

<section class="container circuit">

        <table class="table table-striped table-bordered">
          
            <caption>Gestion clients</caption>
                <thead>
                        <tr>
                            <th>Id</th>
                            <th>Civilité</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Age</th>
                            <th>Nationalité</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Date d'inscription</th>
                            <th>Statut/Action</th>
                        </tr>
                </thead>
                  
                <tbody>
                  
                    <?php
                        $reqselect = "SELECT * FROM agence.client ORDER BY date_inscription ASC";
                        $reqselect = $conn -> query ($reqselect);
                        $resultat = $reqselect-> fetchAll();
                        foreach($resultat as $key => $value) {
                    ?>
                   <tr>
                      <td><?php echo $value['id'];?></td>
                      <td><?php echo $value['civilite'];?></td>
                      <td><?php echo $value['nom'];?></td>
                      <td><?php echo $value['prenom'];?></td>
                      <td><?php echo $value['age'];?></td>
                      <td><?php echo $value['nationalite'];?></td>
                      <td><?php echo $value['telephone'];?></td>
                      <td><?php echo $value['email'];?></td>
                      <td><?php echo $value['date_inscription'];?></td>
  
                      <td col="2">
                      <?php ?>

                      <a href="<?php echo $value['id']; ?>"><button class="btn btn-success" type="submit">Modifier</button></a>    
                       
                      <?php 
                      /*
                      $sup = "DELETE * FROM  agence.circuits where id = :id ";
  
                      $tdr = $conn -> prepare ($sup);
                      $tdr -> execute();
                                      
                      */          
                      ?>
                      
                      <a href="?page=avis&action=supprimer&id=<?php echo $value['id']; ?>"><button class="btn btn-danger"type="submit">Supprimer</button></a>
                      </td>
                  </tr>   
              <?php
                  }
              ?>
            </tbody>
        </table>      
    </section>   
    

    <section class="container circuit">

        <form method="POST" action="">

            <fieldset>
                 <legend>Ajouter clients </legend>   

                    <div class="mb-3">
                        <label class="form-label"><b> Civilité : *</b></label>
                        <select class="form-control" name="civilite" id="civilite">
                                        <option value="">--Indiquer votre civilité--</option>
                                        <option value="Monsieur">Monsieur</option>
                                        <option value="Madame">Madame</option>
                        </select> 
                        <?php
                        if(isset($_GET['civilite']) && ($_GET['civilite']==1)){
                        echo '<span class="red"> Veuillez indiquer votre civilité </span>';
                        }
                        ?>
                    </div> 

                    <div class="row mb-3">
                            <div class="col">
                                <label class="form-label"><b>Nom : *</b></label>
                                <input class="form-control" type="text" name="nom" maxlength="15" placeholder="Dupont">
                                <?php
                                if(isset($_GET['nom']) && ($_GET['nom']==1)){
                                echo '<span class="red"> Veuillez saisir votre nom </span>';
                                }
                                ?>   
                            </div>  

                            <div class="col">
                                <label class="form-label"><b> Prenom : *</b></label>
                                <input class="form-control" type="text" name="prenom" maxlength="15" placeholder="Olivier">
                                <?php
                                if(isset($_GET['prenom']) && ($_GET['prenom']==1)){
                                echo '<span class="red"> Veuillez saisir votre prenom </span>';
                                }
                                ?>
                            </div> 
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><b> Age : *</b></label>
                        <select class="form-control" name="age" id="age">
                                <option value="0">--Votre age--</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                        </select>
                        <?php
                        if(isset($_GET['age']) && ($_GET['age']==1)){
                        echo '<span class="red"> Veuillez indiquer votre date de Naissance </span>';
                        }
                        ?>
                    </div> 

                    <div class="row mb-3">

                        <div class="col">

                            <label class="form-label"><b> Nationalité: *</b></label>
                            <select class="form-control" name="nationalite">
                                <option value="0">--Votre Nationalité--</option>
                                <option value="Centrafricaine">Centrafricaine</option>
                                <option value="Gabonaise">Gabonaise</option>
                                <option value="Camerounaise">Camerounaise</option>
                                <option value="Tchadienne">Tchadienne</option>
                                <option value="Congolaise">Congolaise</option>
                            </select>
                                <?php
                                if(isset($_GET['nationalite']) && ($_GET['nationalite']==1)){
                                echo '<span class="red"> Veuillez indiquer votre nationalité! </span>';
                                }
                                else{
                                    
                                }
                                ?>
                        </div>

                        <div class="col">
                            <label class="form-label"><b> Telephone: *</b></label>
                                    <input  class="form-control form-control-sm" type="tel" name="telephone" minlength="14" maxlength="14">
                                <?php
                                if(isset($_GET['telephone']) && ($_GET['telephone']==1)){
                                echo '<span class="red"> Veuillez saisir votre numero de telephone! </span>';
                                }
                                else{
                                    
                                }
                                ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label"><b>E-mail: *</b></label>
                            <input class="form-control" type="email" name="email" maxlength="20" ="email" placeholder="adresse@.. ">
                            <?php
                            if(isset($_GET['email']) && ($_GET['email']==1)){
                            echo '<span class="red"> Veuillez saisir votre Email ! </span>';
                            $mail = 'Cet utilisateur existe déjà';
                            if($_GET['email']===$verifEmail){
                                echo $mail;
                            }
                            }
                            ?>
                        </div>

                        <div class="col">
                            <label class="form-label"><b>Mot de pass: *</b></label>
                            <input  class="form-control form-control" type="password" name="pwd" minlength="8" maxlength="15" id="pwd" placeholder="mot de pass">
                            <?php
                            if(isset($_GET['pwd']) && ($_GET['pwd']==1)){
                            echo '<span class="red"> Veuillez enregistrer un mot de pass ! </span>';
                            }
                            ?>
                        </div>
                    </div>
                    <br>

                    <div class="text-center">
                        <button class="btn btn-primary" name="envoyer" type="submit" id="envoyer">Envoyer</button>
                    </div>
            </fieldset>
        </form>  
    </section>  

</main>



<?php
include 'include/footer.php';

?>