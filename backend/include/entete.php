<?php
session_start();
setcookie('username','admin',time()+7200);

?>

<header>
    <div class="logo">
        <img src="images/logo.png"/>
    </div>
        <div class="information-user">
            <span><b class="titre">Bienvenu </b><?php if ($_SESSION['donnees_user']['statut']==1){
                echo $_SESSION['donnees_user']['nom'].''.' <b>(Admin)</b>';}else if($_SESSION['donnees_user']['statut']==2){echo $_SESSION['donnees_user']['nom'].''.' <b>(Employé)</b>';} else{echo $_SESSION['donnees_user']['nom'].''.' <b>(stagiaire)</b>'; }?> </span>
            <span class="btn-deconnexion"><a href="deconnexion.php"><img src="images/logout.png" title="Déconnexion" alt="Déconnexion"/></a></span>
        </div>
        <div class="clear"></div>
        
</header>