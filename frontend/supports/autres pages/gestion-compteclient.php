<?php
//demarrage session//

$Title='Modification informations personnelles, Afrique Centrale Découverte';

require 'tableau-de-bord-menu.php';
require 'connexion.php';

    if(array_key_exists('envoyer',$_POST)){
       
        if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['telephone']) || empty($_POST['nationalite'])){;
        header("location:?champvide=1");
        exit();

            function validation_donnees($donnees){

                $donnees = trim($donnees);
                $donnees = stripslashes($donnees);
                $donnees = htmlspecialchars($donnees);
                return $donnees;
            }
           
                $nom = validation_donnees($_POST['nom']);
                $prenom = validation_donnees($_POST['prenom']);
                $telephone = validation_donnees($_POST['telephone']);
                $nationalite = validation_donnees($_POST['nationalite']);
                $id= ($clientConnecte['id']);

                $info_personnelles = [];

                $req = 'UPDATE agence.client SET nom = ? , prenom = ? telephone = ? nationalite = ? WHERE id = :id';
                $conn -> prepare($req);
                

                //modification nom//
                if(!empty($_POST['nom'])){
               

                }
                //$validNom = $conn -> exec($nom, $_SESSION['id']);
                //echo '<pre>';
               // print_r($_SESSION);die;

        }
    }  
?>

<h2 class="text-center p-4"><b>Modifier mes informations personnelles</b></h2>

                  

<?php
            $id= ($_SESSION["donnees_client"]['id']);

            $req = 'SELECT nom, prenom, telephone, nationalite FROM agence.client where id=:id';
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
                            <div class="col">
                                <label class="form-label"><b>Nom : </b></label>
                                <input class="form-control" type="text" name="nom" value="<?php echo $value['nom']; ?>" id="nom" maxlength="15"> 
                            </div>  

                            <div class="col">
                                <label class="form-label"><b> Prenom :*</b></label>
                                <input class="form-control" type="text" name="prenom" value="<?php echo $value['prenom']; ?>" id="prenom" maxlength="15" placeholder="Isabelle">
                            </div> 
                    </div>
                    <div class="row mb-3">

                            <div class="col">
                                <label class="form-label"><b> Telephone: </b></label>
                                <input  class="form-control form-control" type="tel" name="telephone" value="<?php echo $value['telephone']; ?>" id="telephone" minlength="14" maxlength="14">
                            </div>
                            <div class="col">
                                <label class="form-label"><b> Nationalité : </b></label>
                                <input  class="form-control form-control" type="text" name="nationalite" value="<?php echo $value['nationalite']; ?>" id="ville" minlength="14" maxlength="14">
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
                        <button class="btn btn-primary" name="envoyer" type="submit" id="envoyer">Valider mes modifications</button>
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
            <a class="lien sous-titre" href="avis.php" >Je laisse mon avis</a>
        </div>
</aside>

<?php
require 'include-frontend/footer.php';

?>