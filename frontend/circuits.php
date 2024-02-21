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
        <div style="float" ><img src="../backend/uploads/images/<?php echo $value['image']; ?>" alt="Image"/></div>
        <div><font color="#2C5E2E"><b>Destination : </b><?php echo $value['destination']; ?></div>
        <div>
            <b>Type Circuit : </b><?php echo $value['type_circuit'];?>
            <br>
            <b>Prix: </b><?php echo $value['prix']; ?>
        </div>
        <div><a href="reservation.php?id_circuit=<?php echo $value['id']; ?>">
        <br>Je réserve</a></font></a>
        </div>
    </div>
<?php
    }
?>

</main>
<br>

<h6 class="text-center"><b><button class="lien" type="submit" name="valider"> Accéder à tous les circuits </button></h6>
<br>    

</section>

<aside class="container text-center p-2">
    <video src="images/savane1.mp4"  type="video/mp4" controls>
</aside>


<script>
    let reservation = document.getElementById('reservation');
    reservation.addEventListener('click',function(e){
    alert('Merci de bien lire les informations avant de procéder à votre paiement');
    })

</script>

<?php
include 'include-frontend/footer.php';

?>