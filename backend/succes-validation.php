<?php
$Title ='Validation, Afrique Centrale Découverte';

require 'connexion.php';


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Agence de voyages">
    <title><?php echo $Title ?></title>
    <link rel="stylesheet" href="assets/bootstrap.icons.min.css">
    <link rel="stylesheet" href="../backend/assets/bootstrap.min.css">
    <link rel="stylesheet" href="../backend/assets/index.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="images/logo.png"/>
    </div>
    <div class="clear"></div>
</header>

</body>
</html>

<main class="container validation">

      <h1 class="text-center"><b>Formulaire envoyé avec succès !<b><h1>
     <br>
           

     <p>Merci de votre visite à bientôt !</p>
     <br>
     <a href="espaceadmin.php"> Aller à la Page de connexion</a>
     
</main>

<?php
require 'include/footer.php';

?>


