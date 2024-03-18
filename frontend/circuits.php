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
                        /* Nombre de circuit à afficher par page */
                        $pagelimit = 12;
                        /* Nombre total des circuits en base de données */
                        $reqTotalCircuit = "SELECT COUNT(id) AS nb FROM agence.circuits";
                        $tdrTotalCircuit = $conn -> query($reqTotalCircuit);
                        $tdrTotalCircuit -> execute();
                        $resultatTotalCircuit = $tdrTotalCircuit -> fetch();
                        $nbTotalCircuit = $resultatTotalCircuit['nb'];

                        $totalPage = ceil($nbTotalCircuit / $pagelimit);
                        /* Récupération du numéro de la page sélectionnée par l'utilisateur */
                        $numeroPage = (isset($_GET['page'])) ? $_GET['page'] : 1;
                        $start = ($numeroPage - 1) * $pagelimit;
                        $end = $pagelimit;
        //echo "Nombre circuit par page {$pagelimit}<br/>Total circuit en base : {$nbTotalCircuit}<br />Nombre de page : {$totalPage}";die;
                           
                        $reqaffich = "SELECT * FROM agence.circuits ORDER BY id LIMIT $end OFFSET $start";
                            $tdr = $conn -> query($reqaffich);
                            $result = $tdr -> fetchAll();
                            foreach($result as $key => $value) {
                        ?>
        <div style="float: left; margin: 10px; width: 25%; padding: 10px; background: #dddddd;">
            <div>
                <img class="img-fluid" src="../backend/uploads/images/<?php echo $value['image']; ?>" alt="img"/>
            </div>
            <br>
            <div style="float: left;"><b style="color: #2C5E2E">Destination : </b><?php echo $value['destination']; ?></div>
            <div style="float: left;"><b style="color: #2C5E2E">Type Circuit : </b><?php echo $value['type_circuit'];?></div>
            <div style="float: left;"><b style="color: #2C5E2E">Date de départ : </b><?php echo $value['date_depart'];?></div>
            <div style="float: left;"><b style="color: #2C5E2E">Date de retour : </b><?php echo $value['date_retour'];?></div>
            <div style="float: left;"><b style="color: #2C5E2E">Référence Annonce : </b><?php echo $value['id'].'A24';?></div>
            <div style="float: right; margin: 5px;"><b>Prix Circuit: </b><?php echo $value['prix']; ?></div>
            <br>
            <?php if(isset($_SESSION['donnees_client'])) : ?>
            <div style="float: left;margin: 5px; width: 100%;">
                <a class="text-primary2 lien" href="reservation.php?id_circuit=<?php echo $value['id']; ?>">
                Je réserve</a>
            </div>
            <?php endif; ?>
            <br>
        </div>
        <?php
        }
        ?>
        <div style="clear:both;"></div>


        <aside class="container">
        <br>
        <nav aria-label="navigation">
            <ul class="pagination justify-content-center">
                 <!-- Lien page précédente désactivé si on se trouve sur la page de début-->
                <li class="page-item <?= ($numeroPage == 1) ? "disabled" : "" ?>">
                    <a href="circuits.php?<?= $numeroPage - 1 ?>" class="page-link text-primary2">Précédant</a>
                </li>
                <?php for($i = 1; $i <= $totalPage; $i++)
                {
                ?>
                 <li class="page-item"></li>
                    <a href="circuits.php?page=<?php echo $i; ?>" class="page-link text-primary2"><?php echo $i; ?></a>
                </li>
                <?php
                 }
                ?>
                 <!-- Lien page suivante désactivé si on se trouve sur la page de fin-->
                <li class="page-item <?= ($numeroPage ==  $totalPage ) ? "disabled" : "" ?>">
                    <a href="circuits.php? <?= $numeroPage + 1 ?>" class="page-link text-primary2">Suivant</a>
                </li>
            </ul>
        </nav>
        </aside>
    </main>
    <br>
     
    <?php
    if(empty($_SESSION['donnees_client'])): ?>
    
    <h6 class="text-center"><b>
        <a class="text-primary2 lien" href="espaceclient.php">Je m'identifie pour reserver</a>
    </h6>
    <br>

    <?php endif; ?>

<?php
require 'include-frontend/footer.php';

?>