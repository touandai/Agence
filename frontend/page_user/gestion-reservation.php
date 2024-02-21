<?php
//demarrage session//
require 'tableau-de-bord-menu.php';

require 'connexion.php';


//requête pour annuler la reservation // 
/*
$reqSupp = 'DELETE * FROM agence.reservation where id = :';
$valider = $conn -> prepare ($reqSupp);
$valider -> execute ([


])
*/
?>


<h1 class="text-center"><b>Réservation</b></h1>
<br>


<main class="container annule-reservation">

<h3 class="text-center">Je renonce à mon voyage et souhaite annuler ma reservation</h3>
<br>

<table class="table table-striped table-bordered">
    <thead>
            <tr>
                <th>Date</th>
                <th>Référence Reservation</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
    </thead>
    <tbody>
    <?php 
    
        //$req = "DELETE * FROM agence.reservation where id = :id";

        //$tdr = $conn -> query($req);
        //$resultat = $tdr -> fetchAll();

        //foreach($resultat as $key => $value) {
    ?>
        <tr>
            <td><?php  ?></td>
            <td><?php ?></td>
            <td><?php ?></td>
            <td>
               <button class="btn btn-danger sous-titre text-center" type="submit" name="annuler">J'annule ma réservation</button>
            </td>
        </tr>   
    <?php
       // }
    ?>
    </tbody>

</table>

</main>


<aside class="container">

        <div class="col text-center">  
            <a class="lien sous-titre" href="avis.php" >Je laisse mon avis</a>
        </div>

</aside>

<?php
require 'include-frontend/footer.php';

?>