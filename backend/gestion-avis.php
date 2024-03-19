<?php
$Title ="Gérer les avis";

require 'include/header.php';
require 'include/entete.php';
require 'include/menu-nav.php';

require 'connexion.php';

if(array_key_exists('valider',$_POST)){
        
    function validation_donnees($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
        }
                
        $id = validation_donnees($_POST['id']);
        $statut = validation_donnees($_POST['statut']);
        $date_modification = date('Y-m-d h:m:s');

        $reqvalider = 'UPDATE agence.avis SET statut =:statut, date_validation =:date WHERE id =:id';
        $valider = $conn -> prepare ($reqvalider);
        $valider -> bindValue(':id',$id);
        $valider -> bindValue(':statut',$statut);
        $valider -> bindValue(':date',$date_modification);
        $valider -> execute ();
        
        if($valider){
        header("location:?pages=gestion-avis.php&succes=1");
        exit();
        }else {
            header("location:?pages=gestion-avis.php&succes=0");
        }

}

?>

<br>
<h2 class="text-center">Gestion avis Clients </h2>

<main class="container">
    <?php
    if(isset($_GET['succes']) && ($_GET['succes'] == 1)) {
    ?>
    <div style="padding: 20px;color: #ffffff;background: green;text-align:center;"><b>Avis approuvé!</b></div>
    <?php
    }
    ?>

        <table class="table table-striped table-bordered">
          
        <caption>Moderation des avis</caption>
            <thead>
                    <tr>
                        <th class="text-center">Nom</th>
                        <th class="text-center">Note</th>
                        <th class="text-center">Commentaires</th>
                        <th class="text-center">Date publication</th>
                        <th class="text-center">Statut</th>
                        <th class="text-center">Action</th>
                    </tr>
            </thead>
            <tbody>
               
                    <?php

                    $reqselect = "SELECT * FROM agence.avis ORDER BY statut DESC LIMIT 6";
                    $reqselect = $conn -> query ($reqselect);
                    $resultat = $reqselect-> fetchAll();
        
                    foreach($resultat as $key => $value) {
                    ?>
                    <tr>
                        <td><?php echo $value['nom']; ?></td>
                        <td><?php echo $value['note']; ?></td>
                        <td><?php echo $value['message']; ?></td>
                        <td><?php
                        setlocale(LC_TIME,'fr');
                        $datefr = strftime('%d/%m/%Y',strtotime($value['date_avis']));
                        echo $datefr ?>
                        </td>
                        <td><?php echo $value['statut']; ?></td>
                        <td>
                            <form method="POST" action="">
                                <input type="hidden" name="id" value="<?php echo $value['id'];?>" readonly="true">
                                <select name="statut">
                                    <option value="">Modifier</option>
                                    <option value="Confirmée">Confirmée</option>
                                </select>
                                <button class="btn btn-success  sous-titre text-center btn-sm" type="submit" name="valider">Valider</button> 
                            </form>     
                        </td>
                    </tr>   
               <?php
               }
               ?>
               </tbody>
       </table>
</main>

<?php
require 'include/footer.php';

?>