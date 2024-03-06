<?php 
session_start();

$Title='Circuits, Afrique Centrale Découverte';
require 'include-frontend/header.php';
require 'connexion.php';
?>

<h1 class="text-center"><b>Nos Circuits</b></h1>
<br>

<div>
    <h3 class="text-center element sous-titre"> Adaptés à tous les budgets</h3><br>
</div>

<main class="container circuit text-center p-2">
            
                        <?php 

                            $reqaffich = "SELECT 
                            T1.destination
                            , T2.prix
                            , T2.image
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
                            T2.destination = T1.destination 
                            ORDER BY T2.prix ASC";

                            $tdr = $conn -> query($reqaffich);
                            $result = $tdr -> fetchAll();

                            foreach($result as $key => $value) {
                        ?>

    <div style="float: left; margin: 10px;width: 25%; padding: 10px; background: #dddddd;">
        <div><img class="img-fluid" src="../backend/uploads/images/<?php echo $value['image']; ?>" alt="Image"/></div>
        <div><b style="color: #2C5E2E">Destination : </b><?php echo $value['destination']; ?></div>
        <div>
        <b style="color: #2C5E2E">Type Circuit : </b><?php echo $value['type_circuit'];?>
            <br>
            <b style="color: #2C5E2E">Prix: </b><?php echo $value['prix']; ?>
        </div>
        
        <?php if(isset($_SESSION['donnees_client'])) : ?>
        <div><a href="reservation.php?id_circuit=<?php echo $value['id']; ?>">
        <br>Je réserve</a></a>
        </div>
        <?php endif; ?>
        <br/>
        <!--
        <?php
            if(isset($_SESSION['donnees_client'])) {
        ?>
        <div><a href="reservation.php?id_circuit=<?php echo $value['id']; ?>">
        <br>Je réserve</a></font></a>
        </div>
        <?php
            }
        ?>-->
    </div>
<?php
    }
?>
<div style="clear:both"></div>
</main>
<br>

<h6 class="text-center"><b><a href="espaceclient.php"> M'identifier pour reserver un circuit</a></h6>
<br>    

</section>


<!--affichage vidéo-->
<aside class="container text-center p-2">
    <video src="images/savane1.mp4"  type="video/mp4" controls>
</aside>


<?php
include 'include-frontend/footer.php';

?>