<?php
/* Démarrage session */

/*session_start();


/* Racine du projet */
$document_root = "afrique-centrale-decouverte";


$page = (isset($_GET['page'])) ? $_GET['page'] : "connexion";


/* Si l'utilisateur n'est pas connecté.e */
if(isset($_SESSION['user_data'])) {
  
  $userConnecte = $_SESSION['user_data'];

} 

/*echo $page;die;*/

switch($page) {
  /* Tableau de bord */
  case 'tableau-de-bord':
  default:   
    require 'pages/tableau-de-bord.php';
    break;
   /* connexion */
  case 'connexion';
  require 'pages/connexion.php';
  break;
  /* Déconnexion */
  case 'deconnexion';
    require 'pages/deconnexion.php';
    break;
  /* Gestion client*/
  case 'gestion-client':
    require 'pages/gestion-client.php';
     break;
  /* Ajout patients*/
    case 'gestion-circuit':
      require 'pages/gestion-circuit.php';
       break;
  /* Avis*/
  case 'avis':
    require 'pages/avis.php';
    break;
  /* compte client*/
 case 'compte-client':
    require 'pages/compte-client.php';
     break;
     
}


