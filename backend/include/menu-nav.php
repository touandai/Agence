
<nav class="nav-bar menu">
    <b><a href="tableau-de-bord.php">Tableau de bord</a></b>
    <?php 
        /* statut 1 = Admin*/
       //if(in_array([2], $_SESSION['donnees_user']['statut'])) {
        if ($_SESSION['donnees_user']['statut']==1){
    ?>
    <b><a href="gestion-client.php">Gérer les Clients</a></b>
    <?php
    }
    ?>
    <?php  
    ?>
    <b><a href="gestion-circuit.php">Gérer les circuits</a></b>
    <?php 
    if ($_SESSION['donnees_user']['statut']==1){
    ?>
    <b><a href="gestion-reservation.php">Gérer les Réservations</a></b>
    <?php
    }
    ?>
    <b><a href="gestion-avis.php">Gérer les avis</a></b>
</nav>