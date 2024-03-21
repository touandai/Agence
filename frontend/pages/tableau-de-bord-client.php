<?php
$Title='Compte Client, Afrique Centrale Découverte';

require 'tableau-de-bord-menu.php';

require '../connexion.php';


$id= ($_SESSION["donnees_client"]['id']);

$req = 'SELECT nom, date_inscription FROM agence.clients WHERE id = :id';
$selecdate = $conn -> prepare ($req);
$selecdate -> bindvalue(':id', $id);
$selecdate -> execute();
foreach($selecdate as $key => $value){

?>

<h4 class="text-center p-4"><b>Mon Compte Client</b></h4>


<main class="container ">

<div>
    <p><b>Titulaire Compte : </b><?php echo $value['nom']; ?></p>
    <p><b>Date d'inscription : </b>Vous êtes membre depuis le,
    <?php
        setlocale(LC_TIME,'fr');
        $datefr = strftime('%d/%m/%Y',strtotime($value['date_inscription']));
        echo $datefr ?></p>
<div>
<?php
}
?>
</main>

<aside class="container">

        <div class="col text-center">  
            <a class="lien sous-titre" href="../avis.php" >Je laisse mon avis</a>
        </div>

</aside>


<?php
require 'footer.php';

?>