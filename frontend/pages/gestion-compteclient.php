<?php
//demarrage session//

$Title='Modification informations personnelles, Afrique Centrale Découverte';

require 'tableau-de-bord-menu.php';
require '../connexion.php';


    if(array_key_exists('modifier',$_POST)){
        //if(empty($_POST['nom']) || empty($_POST['tel']) || empty($_POST['nat'])){;
        //header("location:?champvide=1");
        //exit();

            function validation_donnees($donnees){
            $donnees = trim($donnees);
            $donnees = stripslashes($donnees);
            $donnees = htmlspecialchars($donnees);
            return $donnees;
            }
            $id = ($_SESSION["donnees_client"]['id']);
            $nom = validation_donnees($_POST['nom']);
            $telephone = validation_donnees($_POST['tel']);
            $nationalite = validation_donnees($_POST['nat']);
              
            $reqModif = 'UPDATE agence.client SET nom =:nom, telephone =:tel, nationalite =:nat WHERE id =:id';
            $statement = $conn -> prepare($reqModif);
            $statement -> bindValue(':id',$id);
            $statement -> bindValue(':nom',$nom);
            $statement -> bindValue(':tel',$telephone);
            $statement -> bindValue(':nat',$nationalite);
            $valider = $statement-> execute();
 
            if($valider){
            header("location:?pages=gestion-compteclient.php&probleme=1");
            }


      // }

    }  
?>

<h4 class="text-center p-2"><b>Modifier mes informations personnelles</b></h4>
                  
              <!--affichage données clients-->
<?php
            $id= ($_SESSION["donnees_client"]['id']);

            $req = 'SELECT nom, telephone, nationalite FROM agence.client where id=:id';
            $reqaffich =$conn -> prepare ($req);
            $reqaffich -> bindvalue(':id', $id);
            $reqaffich -> execute();
            foreach($reqaffich as $key => $value){
?>

<main class="container">

    <section>
        <form method="POST" action="">
            <fieldset>
                 <legend>Mise à jour des données</legend>  
                    
                    <div class="row mb-3">
                            <input type="hidden" name="id" value="<?php echo ($_SESSION['donnees_client']['id']);?>" readonly="true">
                            <div class="col">
                                <label class="form-label"><b>Nom : </b></label>
                                <input class="form-control" type="text" name="nom" value="<?php echo $value['nom']; ?>" id="nom" maxlength="15"> 
                            </div>  
                    </div>
                    <div class="row mb-3">
                            <div class="col">
                                <label class="form-label"><b> Telephone: </b></label>
                                <input  class="form-control form-control" type="tel" name="tel" value="<?php echo $value['telephone']; ?>" id="telephone" minlength="14" maxlength="14">
                            </div>
                    <div class="row mb-3">
                            <div class="col">
                                <label class="form-label"><b> Nationalité : </b></label>
                                <input  class="form-control form-control" type="text" name="nat" value="<?php echo $value['nationalite']; ?>" id="ville" minlength="8" maxlength="14">
                            </div>
                    </div>
                    <div class="text-center">
                    <?php
                        $champvide ='Aucun champ ne doit rester vide  !';
                        if(isset($_GET['champvide'])==1){
                        echo "<b><span class='red'> $champvide </span></b>";
                        }
                        ?>  
                    </div>   
                    <br>
                    <div class="text-center">
                        <button class="btn btn-primary" name="modifier" type="submit" id="envoyer" onclick="return confirm('Validez-vous les modifications apportées?')">Valider mes modifications</button>
                    </div> 
            </fieldset>
        </form>  
    </section>  
</main>
<?php
}
?>

<aside class="container">
        <div class="col text-center">  
            <a class="lien sous-titre" href="../avis.php" >Je laisse mon avis</a>
        </div>
</aside>

<?php
require 'footer.php';

?>