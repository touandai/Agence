<?php 

var_dump($_COOKIE);die;

// retenir l'email de la personne connectée pendant 1 an

$Title='Conditions générale de ventes, Afrique Centrale Découverte';
include 'include-frontend/header.php';

$password ='1233';
$passwordhash = md5($password);
var_dump($passwordhash);


?>

<h1 class="text-center"><b>Conditions Générales de Ventes</b></h1> 



<main class="container">
Conditions générales de ventes
        Pour consulter les conditions générales de ventes

        lien vers un fichier pdf à telecharger
        <nav class="navbar navbar-light bg-light">
                <div class="container">
                  <a class="navbar-brand" href="#">
                    <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24">
                  </a>
                </div>
              </nav>


</main>


<?php
include 'include-frontend/footer.php';

?>