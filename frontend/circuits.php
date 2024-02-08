
<?php 
$Title='Circuits, Afrique Centrale Découverte';

require 'include-frontend/header.php';

require 'connexion.php';

?>

<h1 class="text-center"><b>Nos Circuits</b></h1>


<main class="container circuit text-center main p-4">
        
        <article class="row row-cols-1">     
            
            <div class="col table-responsive-sm">
                
                    <table class="table table-striped table-sm table-bordered">
                        <thead class="thead-light">
                                <tr>
                                    <th>Destination</th>
                                    <th>Prix ttc</th>
                                    <th>Choisir un type</th>
                                    <th>Actions</th>
                                </tr>
                        </thead>


                        <tbody>
                            
                        <?php 

                            $reqaffich = "SELECT 
                            T1.destination
                            , T2.prix
                            , T2.id
                            , T2.type_circuit 
                        FROM (
                            SELECT 
                                destination
                                , min (prix) as prix_min
                            FROM agence.circuits 
                            group by destination 
                        ) T1
                        LEFT JOIN agence.circuits T2 
                            ON T2.prix = T1.prix_min AND 
                            T2.destination = T1.destination";

                            $tdr = $conn -> query($reqaffich);
                            $result = $tdr -> fetchAll();

                            foreach($result as $key => $value) {
                        ?>
                            <tr>
                                <td><?php echo $value['destination']; ?></td>
                                <td><?php echo $value['prix']; ?></td>
                                <td><?php echo $value['type_circuit']; ?></td>
                                <td>
                                <a href="?page=avis&action=ajouter&id=<?php echo $value['id']; ?>">Reserver</a>
                                </td>
                            </tr>   
                        <?php
                            }

                        ?>
                        </tbody>

                    </table>
            </div>
    
       
        
                <?php 
                  /*  $reqaffich = "SELECT T1.destination, T2.prix, T2.id, T2.type_circuit FROM (
                    SELECT destination, min (prix) as prix_min FROM agence.circuits group by destination ) T1
                    LEFT JOIN agence.circuits T2 
                    ON T2.prix = T1.prix_min AND T2.destination = T1.destination";

                    $tdr = $conn -> query($reqaffich);
                    $result = $tdr -> fetchAll();

                    foreach($result as $key => $value) {
                ?>
                    <?php
                }
                 */
                ?>  


<section class="container circuit">
    
    <div class="imagecircuit">
        <img src="images/afrique2.png"/>
    </div>

    <div class="infos-circuits">     
        <div class="titre"><b>Destination</div></b>
        <div class="titre"><b>Prix ttc</div></b>
        <div class="titre"><b>Type de circuit</div></b>
        <div class="titre"><b>Actions</div></b> 
    </div>

</section>

<section class="container circuit">
    
    <div class="imagecircuit">
        <img src="images/pangara3.png"/>
    </div>

    <div class="infos-circuits">     
        <div class="titre"><b>Destination</div></b>
        <div class="titre"><b>Prix ttc</div></b>
        <div class="titre"><b>Type de circuit</div></b>
        <div class="titre"><b>Actions</div></b> 
    </div>

</section>
<section class="container circuit">
    
    <div class="imagecircuit">
        <img src="images/nola.png"/>
    </div>

    <div class="infos-circuits">     
        <div class="titre"><b>Destination</div></b>
        <div class="titre"><b>Prix ttc</div></b>
        <div class="titre"><b>Type de circuit</div></b>
        <div class="titre"><b>Actions</div></b> 
    </div>

</section>
<section class="container circuit">
    
    <div class="imagecircuit">
        <img src="images/img10.png"/>
    </div>

    <div class="infos-circuits">     
        <div class="titre"><b>Destination</div></b>
        <div class="titre"><b>Prix ttc</div></b>
        <div class="titre"><b>Type de circuit</div></b>
        <div class="titre"><b>Actions</div></b> 
    </div>

</section>


</main>



<?php
include 'include-frontend/bouttonreservation.php';

include 'include-frontend/footer.php';

?>