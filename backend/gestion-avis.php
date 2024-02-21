<?php
$Title ="Gérer les avis";

require 'include/header.php';
require 'include/entete.php';
require 'include/menu-nav.php';

require 'connexion.php';

?>
<br>
<h1 class="text-center">Gestion des avis Clients </h1>

<main class="container">


        <table class="table table-striped table-bordered">
          
        <caption>Moderation des avis</caption>
            <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Note</th>
                        <th>Commentaires</th>
                        <th>Date publication</th>
                        <th>Statut/Action</th>
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
                    <td><?php echo $value['id'];?></td>
                    <td><?php echo $value['nom'];?></td>
                    <td><?php echo $value['note'];?></td>
                    <td><?php echo $value['message'];?></td>
                    <td><?php echo $value['date_avis'];?></td>

                    <td col="2">
                    <?php ?>

                    <a href="?page=avis&action=ajouter&id=<?php echo $value['id']; ?>"><button class="btn btn-success" type="submit">Valider</button></a>    
                     
                    <?php 
                    /*
                    $sup = "DELETE * FROM  cabinet_diet.avis where note=0; ORDER BY date_avis ASC ";

                    $tdr = $conn -> query($sup);
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
</main>

<?php
include 'include/footer.php';

?>