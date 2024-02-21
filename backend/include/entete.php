<?php
session_start();

      
?>

<header>
    <div class="logo">
        <img src="images/logo.png"/>
    </div>

    <div class="information-user">
        <span><b class="titre">Bienvenu </b><?php echo $_SESSION['donnees_user']['nom'] ?> </span>
        <span class="btn-deconnexion"><a href="deconnexion.php"><img src="images/logout.png" title="Déconnexion" alt="Déconnexion"/></a></span>
    </div>

    <div class="clear"></div>
</header>




