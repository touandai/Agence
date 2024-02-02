
<?php 
$Title='Circuits, Afrique Centrale Découverte';

include 'include-frontend/header.php';

?>

<h1 class="text-center"><b>Nos Circuits</b></h1>


<main class="container text-center main p-4">
        
        <div class="row row-cols-1">     
            
            <div class="col table-responsive-sm">
                libellé, destination, date départ, date retour, prix, photo, button reservation

                    <table class="table table-striped table-sm table-bordered">
                        <thead class="thead-light">
                                <tr>
                                    <th>Destination</th>
                                    <th>Date de départ</th>
                                    <th>Date de retour</th>
                                    <th>prix ttc</th>
                                    <th>photo</th>
                                    <th>Actions</th>
                                </tr>
                        </thead>
                        <tbody>
                            
                        <?php 

                            //$req = "SELECT * FROM Circuits  ORDER BY date_avis ASC ";
                            //  $tdr = $conn -> query($req);
                        //$resultat = $tdr -> fetchAll();

                            /*foreach($resultat as $key => $value) {
                        ?>
                            <tr>
                                <td><?php echo $value['']; ?></td>
                                <td><?php echo $value['']; ?></td>
                                <td><?php echo $value['']; ?></td>
                                <td><?php echo $value['']; ?></td>
                                <td><?php echo $value['']; ?></td>
                                <td><?php echo $value['']; ?></td>
                                <td>
                                <a href="?page=avis&action=ajouter&id=<?php echo $value['id']; ?>">Ajouter</a>
                                <a href="?page=avis&action=supprimer&id=<?php echo $value['id']; ?>">Supprimer</a>
                                </td>
                            </tr>   
                        <?php
                            }*/

                        ?>
                        </tbody>

                    </table>
            </div>
    

           <div class="col">
                formulaire

            DATE DE DÉPART	DATE DE RETOUR	DURÉE	PRIX TTC PAR PERSONNE	PAIEMENT SÉCURISÉ
            libellé, destination, date départ, date retour, prix, photo, button reservation
            </div>

        </div>    

</main>



<?php
include 'include-frontend/bouttonreservation.php';

include 'include-frontend/footer.php';

?>