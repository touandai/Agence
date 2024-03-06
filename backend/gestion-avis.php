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


        $reqvalider = 'UPDATE agence.avis SET statut =:statut, date_validation =:date WHERE id =:id';
        $valider = $conn -> prepare ($reqvalider);
        $valider -> bindValue(':id',$id);
        $valider -> execute ([
        
        ":id" => $_POST['id'],
        ":statut" => $_POST['statut'],
        ":date" => date('Y-m-d h:m:s'),

        ]);
        if($valider){
        header("location:?pages=gestion-avis.php&succes=1");
        }else {
            echo "<strong> Merci de réessayer plus tard ! </strong>";
        }

}

?>

<br>
<h2 class="text-center">Gestion des avis Clients </h2>

<main class="container">


        <table class="table table-striped table-bordered">
          
        <caption>Moderation des avis</caption>
            <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Note</th>
                        <th>Commentaires</th>
                        <th>Date publication</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
            </thead>
            <tbody>
               
                <?php

                $reqselect = "SELECT * FROM agence.avis ORDER BY date_avis ASC LIMIT 6";
                $reqselect = $conn -> query ($reqselect);
                $resultat = $reqselect-> fetchAll();
       
                foreach($resultat as $key => $value) {
               ?>
                    <tr>
                        <td><?php echo $value['nom']; ?></td>
                        <td><?php echo $value['note']; ?></td>
                        <td><?php echo $value['message']; ?></td>
                        <td><?php echo $value['date_avis'];?></td>
                        <td><?php echo $value['statut']; ?></td>
                        <td>
                            <form method="POST" action="">
                                <input type="hidden" name="id" value="<?php echo $value['id'];?>" readonly="true">
                               
                                <select name="statut">
                                    <option value="">Modifier</option>
                                    <option value="Confirmer">Confirmée</option>
                                </select>
                                
                                <button class="btn btn-success" type="submit" name="valider"> Valider </button>  
                        </td>
                  </tr>   
               <?php
               }
               ?>
               </tbody>
       </table>
</main>

<?php
include 'include/footer.php';

?>