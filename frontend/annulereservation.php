<?php
require 'connexion.php';

//requête pour annuler la reservation // 


$reqSupp = 'DELETE * FROM agence.reservation where id = :';
$valider = $conn -> prepare ($reqSupp);
$valider -> execute ([


])


?>