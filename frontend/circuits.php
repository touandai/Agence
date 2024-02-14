
<?php 
$Title='Circuits, Afrique Centrale Découverte';

require 'include-frontend/header.php';

require 'connexion.php';

?>

<h1 class="text-center"><b>Nos Circuits</b></h1>
<br>

<div>
    <h3 class="text-center element sous-titre"> Quelques circuits basiques et adaptés à vos budgets</h3><br>
</div>

<main class="container circuit text-center main p-4">
            
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

    <div style="float: left; margin: 10px;width: 25%; padding: 15px; background: #dddddd;">
    <div><img src="../backend/uploads/images/<?php echo $value['image']; ?>" alt="Image" /></div>
    <div><font color="#2C5E2E"><b>Destination : </b><?php echo $value['destination']; ?></div>
    <div><b>Type Circuit : </b><?php echo $value['type_circuit'];?><br><b>Prix: </b><?php echo $value['prix']; ?></div>
    <div><b>Référence : </b><?php echo $value['id'];?></font></div>
    <div><a href="reservation.php?id_circuit=<?php echo $value['id']; ?>">Je réserve</a></div>
</div>

<?php
    }
?>
                
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

</main>
<h6 class="text-center"><b>Afin de choisir mes dates, je préfère <a class="lien" href="recherche.php"> Accéder à tous les circuits </a></h6>
<br>

<?php
include 'include-frontend/footer.php';

?>