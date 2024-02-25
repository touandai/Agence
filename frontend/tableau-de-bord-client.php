<?php
$Title='Compte Client, Afrique Centrale Découverte';

require 'tableau-de-bord-menu.php';

require 'connexion.php';


$id= ($_SESSION["donnees_client"]['id']);

$req = 'SELECT nom, date_inscription FROM agence.client WHERE id = :id';
$selecdate = $conn -> prepare ($req);
$selecdate -> bindvalue(':id', $id);
$selecdate -> execute();
foreach($selecdate as $key => $value){

?>

<h2 class="text-center p-4"><b>Mon Compte Client</b></h2>


<main class="container ">
<div>   
<p><b>Titulaire Compte : </b><?php echo $value['nom']; ?>
<p><b>Date d'inscription : </b>Vous êtes membre depuis <?php echo $value['date_inscription']; ?><p>
<div>
<?php
}
?>
</main>

<aside class="container">

        <div class="col text-center">  
            <a class="lien sous-titre" href="avis.php" >Je laisse mon avis</a>
        </div>

</aside>


<?php
require 'include-frontend/footer.php';

?>