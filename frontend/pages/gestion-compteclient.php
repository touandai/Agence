<?php
//demarrage session//

$Title='Modification informations personnelles, Afrique Centrale Découverte';

require 'tableau-de-bord-menu.php';
require '../connexion.php';

    if(array_key_exists('modifier',$_POST)){

            function validationDonnees($donnees){
            $donnees = trim($donnees);
            $donnees = stripslashes($donnees);
            $donnees = htmlspecialchars($donnees);
            return $donnees;
            }
            $id = ($_SESSION["donnees_client"]['id']);
            $nom = validationDonnees($_POST['nom']);
            $telephone = validationDonnees($_POST['tel']);
            $nationalite = validationDonnees($_POST['nat']);
              
            $reqModif = 'UPDATE agence.clients SET nom =:nom, telephone =:tel, nationalite =:nat WHERE id =:id';
            $statement = $conn -> prepare($reqModif);
            $statement -> bindValue(':id',$id);
            $statement -> bindValue(':nom',$nom);
            $statement -> bindValue(':tel',$telephone);
            $statement -> bindValue(':nat',$nationalite);
            $valider = $statement-> execute();
 
            if($valider){
            header("location:?pages=gestion-compteclient.php&probleme=1");
            }
            else {
                header("location:?pages=gestion-compteclient.php&probleme=2");
            }
    }
?>

<h4 class="text-center p-2"><b>Informations personnelles</b></h4>
                  
              <!--affichage données clients-->
<?php
            $id= ($_SESSION["donnees_client"]['id']);

            $req = 'SELECT nom, telephone, nationalite FROM agence.clients where id=:id';
            $reqaffich =$conn -> prepare ($req);
            $reqaffich -> bindvalue(':id', $id);
            $reqaffich -> execute();
            foreach($reqaffich as $key => $value){
?>

<main class="container">

    <section>
        <form method="POST" action="">
        <?php
        if(isset($_GET['probleme']) && ($_GET['probleme'] == 1)) {
        ?>
        <div style="padding: 20px;color: #ffffff;background: green;text-align:center;">
        <strong>Vos cordonnées sont bien mises à jour !</strong></div>
        <?php
        }
        ?>
            <fieldset>
                 <legend class="text-center">Mettre à jour mes données</legend>
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
                        <button class="btn btn-primary" name="modifier" type="submit" id="envoyer"
                        onclick="return confirm('Validez-vous les modifications apportées?')">Valider mes modifications</button>
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