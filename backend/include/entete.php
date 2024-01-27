<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <meta name="description" content="agence de voyages">
  <title>Afrique Centrale Découverte</title>
  <link rel="stylesheet" href="bootstrap-icons.min.css">
  <link rel="stylesheet" href="../backend/assets/bootstrap.min.css">
  <link rel="stylesheet" href="../backend/assets/index.css"/>
</head>

<header>
    <div class="logo">
        <img src="images/logo.png"/>
    </div>

    <?php 
        if(isset($_SESSION['user_data'])) {
    ?>
    <div class="information-user">
        
        <span>Bonjour <?= $userConnecte['prenom'] . " ".$userConnecte['nom'] ?></span>
        <span class="btn-deconnexion"><a href="?page=deconnexion">Me déconnecter? <img src="/<?= $document_root  ?>/admin/images/logout.png" title="Déconnexion" alt="Déconnexion"/></a></span>
    </div>
    
    <?php
        }
    ?>
    <div class="clear"></div>
</header>