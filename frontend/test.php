<?php


//fonction validation donné php

$motif = valid_donnees($_POST["motif"]);
$nom = valid_donnees($_POST["nom"]);
$email = valid_donnees($_POST["email"]);
$telephone = valid_donnees($_POST["telephone"]);
$pays = valid_donnees($_POST["pays"]);

function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}
?>


