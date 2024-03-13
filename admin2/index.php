<?php

$Title='Dashboard, Afrique Centrale Découverte.';

require 'pages/connexion.php';

/* Démarrage session */
/*session_start();


/* Racine du projet */
$document_root = "admin2";

$pages = (isset($_GET['pages'])) ? $_GET['pages'] : "espaceadmin";


//Si l'utilisateur n'est pas connecté//
if(!isset($_SESSION['donnees_user'])){ 
  header('location:/' . $document_root . 'espaceadmin.php');
}
//si on retrouve l'utilisateur//
$userConnecte = $_SESSION['donnees_user']['nom']; 



switch($pages) {
  /* Tableau de bord */
  case 'tableau-de-bord':
  default:   
    require 'pages/tableau-de-bord.php';
    break;
   /* connexion */
  case 'connexion';
    require 'pages/espaceadmin.php';
    break;
   /* inscription */
  case 'inscription';
  require 'pages/inscription.php';
  break;
  /* Déconnexion */
  case 'deconnexion';
    require 'pages/deconnexion.php';
    break;
  /* Gestion client*/
  case 'gestion-client':
    require 'pages/gestion-client.php';
    break;
  /* Gestion circuits*/
  case 'gestion-circuit':
    require 'pages/gestion-circuit.php';
    break;
  /* Gestion reservation*/
  case 'gestion-reservation':
    require 'pages/gestion-reservation.php';
    break;
  /* Gestion Avis*/
  case 'avis':
    require 'pages/gestion-avis.php';
    break;
      /* ajout client*/
  case 'ajout-client':
    require 'pages/ajout-client.php';
    break;
      /* ajout circuit*/
  case 'ajout-circuit':
    require 'pages/ajout-circuit.php';
    break;
}


