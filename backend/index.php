<?php

$Title='Dashboard, Afrique Centrale Découverte.';
require 'connexion.php';
/* Démarrage session */
/*session_start();


/* Racine du projet */
$backend =(isset($_GET['backend']))?:"espaceclient";


//Si l'utilisateur n'est pas connecté//
if(!isset($_SESSION['donnees_user'])){ 
  header("location:backend/espaceadmin.php");
}
//si on retrouve l'utilisateur//
$userConnecte = $_SESSION['donnees_user']['nom']; 



switch($backend) {
  /* Tableau de bord */
  case 'tableau-de-bord':
  default:   
    require 'backend/tableau-de-bord.php';
    break;
   /* connexion */
  case 'connexion';
    require 'backend/espaceadmin.php';
    break;
  /* Déconnexion */
  case 'deconnexion';
    require 'backend/deconnexion.php';
    break;
  /* Gestion client*/
  case 'gestion-client':
    require 'backend/gestion-client.php';
    break;
  /* Gestion circuits*/
  case 'gestion-circuit':
    require 'backend/gestion-circuit.php';
    break;
  /* Gestion reservation*/
  case 'gestion-reservation':
    require 'backend/gestion-reservation.php';
    break;
  /* Gestion Avis*/
  case 'avis':
    require 'backend/gestion-avis.php';
    break;
}


