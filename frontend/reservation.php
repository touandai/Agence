<?php 
session_start();
$Title='Reservations, Afrique Centrale Découverte';


if(!isset($_SESSION['donnees_client'])){ 
    header("location:espaceclient.php");
    }
$clientConnecte = $_SESSION['donnees_client'];



require 'include-frontend/header.php';

require 'connexion.php';

  // if(isset($_POST['envoyer'])){
    if(array_key_exists('envoyer',$_POST)){

        if(isset($_POST['nombre_personne']) && empty($_POST['nombre_personne'])){
        header("location:?id_circuit=".$_GET['id_circuit']."&nombre_de_personne=1");
        exit();
        }
        if(isset($_POST['type_reglement']) && empty($_POST['type_reglement'])){
            header("location:?id_circuit=".$_GET['id_circuit']."&type_reglement=1");
            
            }
       
           function validation_donnees($donnees){
                $donnees = trim($donnees);
                $donnees = stripslashes($donnees);
                $donnees = htmlspecialchars($donnees);
                return $donnees;
            }
            
            $nombre_personne = validation_donnees($_POST['nombre_personne']);
            $prix_total = validation_donnees($_POST['prix_total']);
            $type_reglement = validation_donnees($_POST['type_reglement']);
            $id_circuit = $_GET['id_circuit'];


           // Vérification de l'existence du circuit dans la base 
            $reqVerifCircuit = "SELECT * FROM agence.circuits WHERE id = :idCircuit";
            $verif = $conn -> prepare($reqVerifCircuit);
            $verif -> bindValue(':idCircuit', $id_circuit);
            $verif -> execute();
            $circuit = $verif -> fetch();
           
            if(empty($circuit)) {
                header('location:circuits.php');
                exit();
            }
            
                $insertReservation ='INSERT INTO agence.reservations(nombre_personne, prix, type_reglement, id_circuit, date_reservation, statut, id_client)
                values (:nombre_personne, :prix_total, :type_reglement, :id_circuit, :date, :statut, :idClient)';

                    $insert = $conn -> prepare ($insertReservation);
                    $save = $insert-> execute([
     
                        ":nombre_personne" => $nombre_personne,   
                        ":prix_total" => $prix_total,
                        ":type_reglement" => (empty($type_reglement)) ? NULL : $type_reglement,
                        ":id_circuit" => $id_circuit,
                        ":date" => date('Y-m-d h:m:s'),
                        ":statut" => "En attente",
                        ":idClient" => $clientConnecte['id'],
                    ]);    
                if($save){
                    header('location:confirmation-reservation.php');
                }
                echo 'erreur';die;

               //  $type_reglement, verif champs paiement 
    }

?>

<h1 class="text-center"><b>Reservations<b></h1>

<main class="container reservation">

    <section>

        <form id="reservation" method="POST" action="">

            <fieldset>
                <legend >Choix formule et type de réglement</legend>     
                <!--récuperation valeur id du prix du circuit à multiplier avec le nombre de personnes-->
                <div class="mb-3">
                <label class="form-label"><b> Prix Circuit : </b></label>
                <?php 

                $id = $_GET['id_circuit'];
                $req = "SELECT prix FROM agence.circuits WHERE id = :id";
                $selectPrix = $conn -> prepare ($req);
                $selectPrix -> bindvalue(':id',$id);
                $selectPrix -> execute();
                foreach($selectPrix as $key => $value){                
                ?> 
                <div class="element"><?php echo $value['prix'].' '.'F.CFA';?></div>
                <input class="form-control" type="number" value="<?php echo $value['prix'];?>" name="prixcircuit" id="prix" maxlength="6" readonly="true">
                </div> 
                <?php
                }
                ?>

                <div class="mb-3">
                    <label class="form-label"><b> Nombre de personnes : *</b></label>
                    <select class="form-control" name="nombre_personne" id="nombre">
                                    <option value="">--Choisir--</option>
                                    <option value="1">Seul(e)</option>
                                    <option value="2">Couple</option>
                                    <option value="3">Groupe</option>
                    </select> 
                    <?php if(isset($_GET['nombre_de_personne']) && ($_GET['nombre_de_personne']==1)){
                    echo '<span id="erreur" class="red"> Veuillez saisir votre nom </span>';
                    }
                    ?> 
                    <div style="color: red;font-style:italic;" id="erreur-nombre"></div>
                </div> 

                <!--calcul prixtotal = nombre_personne  * prix circuit-->
                <div class="row mb-3">
                    <label class="form-label"><b> Prix total de la réservation : </b></label> 
                    <input class="form-control" type="text" name="prix_total" id="prix_total" readonly="true">
                </div>
                <div class="mb-3">
                    <label class="form-label"><b> Type de réglement : *</b></label>
                    <select class="form-control" name="type_reglement" id="type_reglement">
                                    <option value="">--Choisir--</option>
                                    <option value="espece">En espèce en agence</option>
                                    <option value="cheque">Chèque</option>
                                    <option value="virement">Virement</option>
                    </select> 
                    <?php if(isset($_GET['type_reglement']) && ($_GET['type_reglement']==1)){
                    echo '<span id="erreur" class="red"> Veuillez indiquer le type de réglement! </span>';
                    }
                    ?> 
                </div>

                <div class="text-center">
                    <button class="btn btn-primary" name="envoyer" type="submit" id="valider">Valider ma reservation</button>
                </div>
            </fieldset>
        </form>  
    </section>
</main>

<script>
    /*
    let affichprixtcc = document.getElementById('valider');
    affichprixtcc.addEventListener('click', function (e){
    alert('Un email de confirmation vous sera envoyé en fonction de la formule choisie ! ')
    })
    */
</script>

<?php
require 'include-frontend/footer.php';

?>
