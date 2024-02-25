<?php
extract($_POST);

$Title='Recherche de circuit, Afrique Centrale Découverte.';

require 'connexion.php';

require 'include-frontend/header.php';
?>
<section id="recherche" class="container">

<div id="form-recherche" class="container input-group">
     <form method="POST" action="recherche.php" class="d-flex">
        <input class="form-control me-2" type="search" name="destination" placeholder="Destination" aria-label="Search">
        <input class="form-control me-2" type="search" name="date_depart" placeholder="Date Depart" aria-label="Search">
        <select class="form-control me-2" type="search" name="circuit" aria-label="Search">
            <option value="">Choisir type Circuit</option>
            <option value="aller/retour simple">Aller/retour simple</option>
            <option value="aller/retour simple + hotel">aller/retour simple + hotel</option>
        </select>
        <button class="btn btn-secondary" type="submit">recherche</button>
     </form>
</div>
</section>
<h1 class="text-centre">Circuits</h1>

<main class="container recherche content">
<?php
/* 1 - renseigne la destination uniquement 
   2- si renseigne uniquement date 
   3- si renseigne uniquement type_circuit
   
   4 - si destination + date_circuit 
   5- si destination + type_circuit
   6- date_circuit + type_circuit
*/
  $donneesDeRecherche = [];


    //echo ' > Ma requete initiale est : ' . $reqRecherche;

  $reqRecherche = " SELECT * FROM agence.circuits WHERE 1 = 1";

  /* Seulement la destination est renseignée */
    if(!empty($_POST['destination'])){
        $reqRecherche .= " AND UPPER(destination) LIKE :destination";
        $donneesDeRecherche[':destination'] =  "%".strtoupper($destination)."%";
    }
 
    //echo "<br /> > Ensuite après ma condition 1 : " . $reqRecherche;

    /* Seule la date de départ est à renseigner */

    if(!empty($date_depart)) {
        $reqRecherche .= " AND date_depart >= :dateDepart";
        $donneesDeRecherche[':dateDepart'] = $date_depart;
    }
    //echo "<br /> > Après ma condition 2 : " . $reqRecherche . '<br/>';
    if(!empty($circuit)) {
        $reqRecherche .= " AND type_circuit = :circuit";
        $donneesDeRecherche[':circuit'] = $circuit;
    }
    /*if(empty($_POST['destination']) AND empty($date_depart) AND empty($circuit)){
        echo "<p> $result </p>";
    }
    */
    //echo "<br /> > Après ma condition 3 : " . $reqRecherche . '<br/>';
    //var_dump($donneesDeRecherche);die;
    $tdr = $conn -> prepare($reqRecherche);
    //$tdr -> bindValue(':destination', "%".strtoupper($destination)."%");
    $tdr -> execute($donneesDeRecherche);
    
    $result = $tdr -> fetchAll();
    $nombreDeResultat = count($result);


    foreach($result as $key => $value) {
?>
<div style="float: left; margin: 10px;width: 25%; padding: 15px; background: #dddddd;">
    <div><font color="#2C5E2E"><b>Destination : </b><?php echo $value['destination']; ?></div>
    <div><b>Date de depart : </b><?php echo $value['date_depart']; ?></div>
    <div><b>Date de Retour : </b><?php echo $value['date_retour']; ?></div>
    <div><b>Type Circuit : </b><?php echo $value['type_circuit'];?></div>
    <div><b>Prix : </b><?php echo $value['prix']; ?></font></div>
</div>
<?php
    }
?>
<div style="clear: both;"></div>
<br><br>

</main>
<br>
<?php if($nombreDeResultat !=="") : ?>
<h6 class="text-center"><b><a class="lien" href="circuits.php"> Je selectionne mon circuit > </a></h6>
<br>
<?php endif; ?>

<?php
include 'include-frontend/footer.php';

?>
<script src="bootstrap.bundle.min.js"></script>
</body>
</html>
