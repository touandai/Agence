<?php

$Title='Dashboard, Afrique Centrale Découverte.';
/* Démarrage session */
/*session_start();


/* Racine du projet */

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
    require 'espaceadmin.php';
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
    require 'pages/gestion-avis.php';
    break;
  /* compte client*/
  case 'compte-client':
    require 'pages/gestion-compte-client.php';
    break;
 /* galerie */    
  case 'galerie':
    require 'pages/galerie.php';
    break;
}


