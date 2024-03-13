<?php
session_start();

$Title='Avis clients, Afrique Centrale Découverte';

require 'include-frontend/header.php';
require 'connexion.php';

if(array_key_exists('valider',$_POST)){


     //fonction de validation des données contre les inections de type XSS

     function validation_donnees($donnees){

        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        
        return $donnees;
        }
        
        $nom = validation_donnees($_POST['nom']);
        $note = validation_donnees($_POST['note']);
        $commentaire= htmlspecialchars($_POST['commentaire']);
        $id_client = validation_donnees($_SESSION["donnees_client"]['id']);
        
        //$date = new DateTime($date_avis);
        //$date_avis ->format('d/m/Y');

        $reqInsert = 'INSERT INTO agence.avis (nom, note, message, date_avis, statut, id_client) 
        values (:nom, :note, :message, :date, :statut, :id_client)';
        
        $insert = $conn -> prepare ($reqInsert);
        $insert->bindValue(':id_client',$id_client);
        $save = $insert-> execute([
                 
            ":nom" => $nom,   
            ":note" => $note,
            ":message" => $commentaire,
            ":date" => date('d/m/Y'),
            ":statut" => "En attente de validation",
            ":id_client" => $id_client,
        ]);    

        header("location:succes-validation.php");
   
}

?>



<h1 class="text-center"><b>Avis</b></h1> 


<main class="container avis">

        <section id="dropdownMenuButton" data-toggle="dropdown">     
                <form class="form" method="POST" id="myform" action="">                    
                       <fieldset>
                            <legend>Laissez-nous votre avis</legend>
                                <div class="p-2">
                                    <label class="form-label" for="name"><b>Pseudo:*</b></label>
                                    <input class="form-control" type="text" name="nom" id="name" placeholder="Martin" maxlength="12"/>
                                    <span id="erreur"></span>
                                </div>

                                <div class="p-2">
                                    <label class="form-label" for="note"><b>Note :*</b></label>
                                    <input class="form-control" type="number" id="note" min="0" max="10" name="note" placeholder="Choisir entre 0 et 10"/>
                                    <span id="erreur2"></span>                     
                                </div>
                                <div class="p-2">
                                    <label class="form-label" for="commentaire"><b>Commentaire :*</b></label>
                                    <textarea class="form-control"  name="commentaire" id="commentaire" placeholder="votre message ici"></textarea>
                               
                                    <span id="erreur3"></span>
                               </div>
                               <br>

                               <div class="text-center">
                                <button class="btn btn-secondary" id="valider" name="valider" type="submit">Valider</button>
                               </div>
                        </fieldset>
                </form> 
        </section>

</main>

<?php
require 'connexion.php';

?>

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
             <a  class="ancre" href="politique.html">Politiques de confidentialité </a>
        </div>


    </div>
</footer>

<div class="container-fluid footer2">
    
    <div class="row text-center">

        <div class="col p-1">
             <a  class="" href="cgv.html">Conditions Générales de ventesV</a>
        </div>

        <div class="col p-1">
             <a class="" href="avis.php" >Laisser un avis</a>
        </div>
  
        <div class="col p-1">
             <a  class="ancre-footer2" href="https://cemac.int/">Cemac</a>
             <a  class="ancre-footer2" href="">Mentions utiles</a>
             <a  class="ancre-footer2" href="https://www.afrique-tourisme.com/">S'informer utiles</a>
        </div>

    </div>  

</div> 

       
<script>
    let Myform = document.getElementById('myform');
    Myform.addEventListener('submit',function(e){
        let inputNom = document.getElementById('name')
        let inputNote = document.getElementById('note')
        let Commentaire = document.getElementById('commentaire')
        let myRegex = /^[a-zA-Z]+$/;

        if (inputNom.value ==""){
            let Erreur = document.getElementById('erreur');
            Erreur.innerHTML ="Veuillez saisir votre nom";
            Erreur.style.color ='red';
            e.preventDefault();
        }else if (myRegex.test(inputNom.value) == false){
            let Erreur = document.getElementById('erreur');
            Erreur.innerHTML ="Le nom doit composer que de lettres sans espace ni tiret";
            Erreur.style.color ='red';
            e.preventDefault();
        }else{         
            let Erreur = document.getElementById('erreur');
            Erreur.innerHTML ="champ valide";
            Erreur.style.color ='green';
        }  
        if (inputNote.value ==""){
            let Erreur2 = document.getElementById('erreur2');
            Erreur2.innerHTML ="Veuillez choisir une note";
            Erreur2.style.color = 'red';

        e.preventDefault();
        } 
        if (Commentaire.value ==""){
            let Erreur3 = document.getElementById('erreur3');
            Erreur3.innerHTML ="Veuillez indiquer votre message";
            Erreur3.style.color = 'red';
        e.preventDefault();
        }
    }) 
</script>

</body>
</html>