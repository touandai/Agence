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

                            $reqaffich = 'SELECT * FROM agence.circuits ORDER BY id LIMIT 12 OFFSET 12;';

                            $tdr = $conn -> query($reqaffich);
                            $result = $tdr -> fetchAll();

                            foreach($result as $key => $value) {
                        ?>

<div style="float: left; margin: 10px; width: 25%; padding: 10px; background: #dddddd;">
            <div><img class="img-fluid" src="../backend/uploads/images/<?php echo $value['image']; ?>" alt="Image"/></div><br>
            <div style="float: left;"><b style="color: #2C5E2E">Destination : </b><?php echo $value['destination']; ?></div>
            <div style="float: left;"><b style="color: #2C5E2E">Type Circuit : </b><?php echo $value['type_circuit'];?></div>
            <div style="float: left;"><b style="color: #2C5E2E">Date de départ : </b><?php echo $value['date_depart'];?></div>
            <div style="float: left;"><b style="color: #2C5E2E">Date de retour : </b><?php echo $value['date_retour'];?></div>
            <div style="float: left;"><b style="color: #2C5E2E">Référence Annonce : </b><?php echo $value['id'].'A24';?></div>
            <div style="float: right; margin: 5px;"><b>Prix Circuit: </b><?php echo $value['prix']; ?></div><br>       
            
            <?php if(isset($_SESSION['donnees_client'])) : ?>
            <div style="float: left;margin: 5px; width: 100%;"><a class="text-primary2 lien" href="reservation.php?id_circuit=<?php echo $value['id']; ?>">Je réserve</a></div>
            <?php endif; ?>
            <br>
        
            <!--
            <?php
                if(empty($_SESSION['donnees_client'])){
            ?>
            <div style="float: left;margin: 5px; width: 100%;"><a href="reservation.php?id_circuit=<?php echo $value['id']; ?>">
            <br>Je m'enregistre et procéde à ma reservation</a></font></a>
            </div>
            <?php
                }
            ?>
            -->
        </div>

        <?php
            }
        ?>
        <div style="clear:both;"></div>


    <aside class="container">
    <br>
        <div class="details-page">
            de 1-4
        </div>
        <nav aria-label="navigation">
            <ul class="pagination justify-content-center"> 
                <li class="page-item "></li>
                <a href="#" class="page-link text-primary2 disabled">Précédant</a>
                </li>   
                <li class="page-item"></li>
                <a href="circuit-page2.php" class="page-link text-primary2 active">1</a>
                </li> 
                <li class="page-item"></li>
                <a href="circuit-page3.php" class="page-link text-primary2">2</a>
                </li>  
                <li class="page-item"></li>
                <a href="circuit-page4.php" class="page-link text-primary2">3</a>
                </li> 
                <li class="page-item"></li>
                <a href="#" class="page-link text-primary2">Suivant</a>
                </li> 
            </ul>   
        </nav> 

        </aside>
    </main>
    <br>

    <?php
    if(empty($_SESSION['donnees_client'])): ?>
    ?>
    <h6 class="text-center"><b><a class="text-primary2 lien" href="espaceclient.php"> M'identifier pour reserver un circuit</a></h6>
    <br>   
    <?php endif; ?>

<?php
include 'include-frontend/footer.php';

?>