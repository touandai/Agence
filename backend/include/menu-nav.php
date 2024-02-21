

<nav class="nav-bar menu">
    <?php 
        /* 1 = Admin, 2 = Employé */ 
        //if(in_array([1,2], $_SESSION['donnees_user']['statut'])) {
    ?>
    <b><a href="tableau-de-bord.php">Tableau de bord</a></b>
    <?php
      //  }
    ?>
    <?php 
        /* 1 = Admin,*/
        
       // if(in_array([1], $_SESSION['donnees_user']['statut'])) {
    ?>
    <b><a href="gestion-client.php">Gérer les Clients</a></b>
    <?php
      //  }
    ?>
    <?php 
        /* 1 = Admin,*/
        
       // if(in_array([1,2], $_SESSION['donnees_user']['statut'])) {
    ?>
    <b><a href="gestion-circuit.php">Gérer les circuits</a></b>
    <?php
       // }
    ?>
    <?php 
        /* 1 = Admin,*/
       // if(in_array([1], $_SESSION['donnees_user']['statut'])) {
    ?>
    <b><a href="gestion-reservation.php">Gérer les Réservations</a></b>
    <?php
     //  }
    ?>
    <?php 
        /* 1 = Admin, 2 = employé,*/
      //  if(in_array([1,2], $_SESSION['donnees_user']['statut'])) {
    ?>
    <b><a href="gestion-avis.php">Gérer les avis</a></b>
    <?php
     //  }
    ?> 
</nav>