<?php 
$Title='Reservations, Afrique Centrale Découverte';

require 'include-frontend/header.php';

require 'connexion.php';


 if (isset($_POST['envoyer']) AND !empty($_POST['nombre']) AND !empty($_POST['circuit']) AND !empty($_POST['paiement'])){

  

   /*

    $InsertRervation ='INSERT INTO agence.reservations(nombre_personne, prix, type_reglement, id_circuit, date_reservation)
    values (:nombre, :prix, :paiement, :circuit, :date)';

    

    $reqInsert = $conn -> prepare ($InsertRervation);
    $save = $reqInsert->execute([
    
    ":nombre" => $nombre,
    ":circuit" => $circuit,   
    ":prix" => $prix,
    ":paiement" =>$paiement,       
    ":date" =>date('Y-m-d h:m:s'),

    ]);
    header('location:confirmation-reservation.php');
  */







 }

?>



<h1 class="text-center"><b>Reservations<b></h1>




<main class="container reservation">

    <section>

        <form id="reservation" method="POST" action="">

            <fieldset>
                <legend>Le coût de votre réservation sera affiché!</legend>   

                <div class="mb-3">
                    <label class="form-label"><b> Nombre de personnes : *</b></label>
                    <select class="form-control" name="nombre" id="nombre">
                                    <option value="">--Choisir--</option>
                                    <option value="1">Solo</option>
                                    <option value="2">Couple</option>
                                    <option value="3">Forfait Groupe</option>
                    </select> 
                    <?php
                    if(empty($_POST['nombre'])){
                    echo '<span class="red"> Veuillez choisir une formule </span>';
                    }
                    ?>
                </div> 

                <div class="mb-3">
                    <label class="form-label"><b> Réference Circuit : *</b></label>
                    <input class="form-control" type="text" name="circuit" minlength="1" maxlength="2" placeholder="25">
                    <?php
                    if(empty($_POST['circuit'])){
                    echo '<span class="red"> Veuillez indiquer la réference circuit à 2 chiffres </span>';
                    }
                    ?> 
                </div> 

                <div class="row mb-3">
                    <label class="form-label"><b> Prix ttc : </b></label>
                    <input class="form-control" type="text" name="prix" value="" maxlength="15" placeholder="145.000"> 
                </div>

                <div class="mb-3">
                    <label class="form-label"><b> Type de réglement : *</b></label>
                    <select class="form-control" name="paiement" id="paiement">
                                    <option value="">--Choisir--</option>
                                    <option value="espece">En agence en espèce</option>
                                    <option value="cheque">Chèque</option>
                                    <option value="virement">Virement</option>
                    </select> 
                    <?php
                    if(empty($_POST['paiement'])){
                    echo '<span class="red"> Veuillez choisir le type de réglement</span>';
                    }
                    ?>
                </div>

                <div class="text-center">
                    <button class="btn btn-primary" name="envoyer" type="submit" id="envoyer">Valider ma reservation</button>
                </div>
            </fieldset>
        </form>  
    </section>
</main>





<script>  
     let mareservation = document.getElementById('envoyer');
     mareservation.addEventListener('click', function (e){
    alert('Merci de bien lire les informations avant de procéder à votre paiement')
     })

</script>


<?php
require 'include-frontend/footer.php';

?>