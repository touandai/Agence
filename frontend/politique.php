<?php 

$Title='Politique de confidentialité, Afrique Centrale Découverte';
require 'include-frontend/header.php';
require 'connexion.php';
?>

<body>

    <h1 class="text-center">Politique de confidentialité</h1> 

    <main class="container content">
    
            <p>La présente « Politique de confidentialité » est mise à jour régulièrement, 
            la dernière mise à jour date du 29 mai 2023 : nous vous invitons à la consulter
            aussi souvent que possible afin d’être informé.e des éventuelles dernières 
            modifications.
           </p>
           <ul>
                <li>Le partage des Données personnelles collectées</li>
                <li>Les droits relatifs aux Données personnelles et leur gestion</li>
                <li>Publication des Avis client</li>« Avis client », 
                désignation générale regroupant les « Avis Produit » ainsi que les « Avis Marque » ;
                <li>Les traitements de Données à caractère personnel</li>
                <li>Les cookies et autres traceurs</li>
           </ul>
     
    </main>
        

<aside class="container main p-4">
   
    <div class="row row-cols-2">
    
    <div class="col" >
        <p class="text-centre"><b>Les derniers avis de nos clients</b></p>
        <hr>
        <p>
        
        <?php  
         $reqselect = "SELECT * FROM agence.avis ORDER BY date_avis ASC LIMIT 2";
         
         $reqselect = $conn -> query ($reqselect);
         $resultat = $reqselect-> fetchAll();

         foreach($resultat as $key => $value) {
        ?>
         <b>Posté par</b> : <?php echo $value['nom']; ?> <br><b>Note : </b>
         <?php echo $value['note']; ?> <b> Message : </b> <?php echo $value['message'];?> <b> Date : </b> 
         <?php echo $value['date_avis'];?></p>
        <?php
         }
        
        ?>
    </div>
    <div class="col reseaux-sociaux">
        <div>
            <p class="text-centre"><b>Suivez-nous sur les réseaux sociaux</b></p>
            <hr>
            <p class="text-centre" >
            <a href="#"><img src="images/fb.png" alt="facebook"/></a> 
            <a href="#"><img src="images/whatapps.png" alt="whatapps"/></a>
            <a href="#"><img src="images/twiter.png" alt="twiter" /></a>
            <a href="#"><img src="images/tiktok.png" alt="tiktok"/></a>       
           </p> 
        </div>   
    </div>
</aside>



<footer class="container-fluid footer">

    <div class="row">

        <div class="col">
            <h4 class="text-center ancre">Nos horaires d'ouverture</h4>
        </div>

    </div>


    <div class="row">

        <div class="col text-centre">
            <a href="contact.php">Contact</a>       
        </div>
        <div class="col text-centre">
            <p class="ancre">Du lundi au samedi de : 7h30 - 12h00 et de : 13h00 - 17:00 </p>  
        </div>
        <div class="col text-centre">
             <a  class="ancre" href="politique.php">Politiques de confidentialité </a>
        </div>


    </div>
</footer>

<div class="container-fluid footer2">
    
    <div class="row text-center">

        <div class="col p-1">
             <a  class="" href="cgv.php">Conditions Générales de ventesV</a>
        </div>
  
        <div class="col p-1">
             <a  class="ancre-footer2" href="https://cemac.int/">Cemac</a>
             <a  class="ancre-footer2" href="#">Mentions utiles</a>
             <a  class="ancre-footer2" href="https://www.afrique-tourisme.com/">infos utiles</a>
        </div>

    </div>  

</div>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/application.js"></script>
<script type="text/javascript" src="js/contact.js"></script>
<script type="text/javascript" src="js/inscription.js"></script>
</body>
</html>
