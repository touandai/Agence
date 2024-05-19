<?php
/* On démarre la session */
$Title='Admin';
require 'connexion.php';
/* Démarrage session */
/*session_start();


/* Racine du projet */
$document_root = "afrique-centrale-decouverte";

$backend = (isset($_GET['backend'])) ? $_GET['backend'] : "login";


//Si l'utilisateur n'est pas connecté//

if(!isset($_SESSION['donnees_user'])) {
  header('location:/' . $document_root . '/backend/espaceadmin.php');
}

//si on retrouve l'utilisateur//
$userConnecte = $_SESSION['donnees_user']['nom'];


switch($backend) {
  /* Tableau de bord */
  case 'tableau-de-bord':
    default:
    require 'backend/tableau-de-bord.php';
  /* espace-admin */
  case 'espace-admin':
    require 'backend/espaceadmin.php';
    break;
      /* inscription*/
  case 'espace-admin':
    require 'backend/inscription.php';
    break;
  /* Déconnexion */
  case 'deconnexion';
    require 'backend/deconnexion.php';
    break;
  /* connexion */
  case 'connexion';
  require 'backend/connexion.php';
  break;
  /* Ajout client*/
    case 'ajout-client':
      require 'backend/ajout-client.php';
       break;
/* Gestion client*/
    case 'gestion-client':
        require 'backend/gestion-client.php';
         break;
  /* Ajout circuit*/
  case 'ajout-circuit':
    require 'backend/ajout-circuit.php';
     break;
/* Gestion circuit*/
  case 'gestion-circuit':
      require 'backend/gestion-circuit.php';
       break;
   /*gestion reservation*/
   case 'gestion-reservation':
    require 'backend/gestion-reservation.php';
     break;
  /* Gestion Avis*/
  case 'gestion-avis':
    require 'backend/gestion-avis.php';
    break;
}


