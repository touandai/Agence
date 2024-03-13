<?php
//demarrage session//
require 'tableau-de-bord-menu.php';

require '../connexion.php';

    if(array_key_exists('valider',$_POST)){
        
        function validation_donnees($donnees){
            $donnees = trim($donnees);
            $donnees = stripslashes($donnees);
            $donnees = htmlspecialchars($donnees);
            return $donnees;
            }
                                
            $id = validation_donnees($_POST['id']);
            $statut = validation_donnees($_POST['statut']);
            $date = date('Y-m-d h:m:s');

            $reqAnnul = 'UPDATE agence.reservations SET statut = :statut, date_annulation =:date WHERE id = :id';
            $valider = $conn -> prepare ($reqAnnul);

            $valider -> bindValue(':id',$id);
            $valider -> bindValue(':statut',$id);
            $valider -> bindValue(':date',$date);

            $valider -> execute ();
            
            //":id" => $_POST['id'],
            //":statut" => $_POST['statut'],
            //":date" => date('Y-m-d h:m:s'),
           
            if($valider){
            header("location:?pages=gestion-reservation.php&succes=1");die;
            }else {
                echo "<strong> Merci de réessayer plus tard ! </strong>";
            }

    }

?>


<h4 class="text-center p-4"><b>Réservations</b></h4>
<br>


<main class="container annule-reservation">


<p class="text-center span"></p>
<br>



<table class="table table-striped table-bordered">
    <thead>
            <tr>
                <th>Date</th>
                <th>Référence Reservation</th>
                <th>Prix</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
    </thead>

    <tbody>

    <?php
        $id= $clientConnecte['id'];


        $req = 'SELECT date_reservation, id, prix, statut FROM agence.reservations WHERE id_client = :id_client LIMIT 3';
        $resultat = $conn -> prepare ($req);
        $resultat -> bindvalue(':id_client', $id);
        $resultat -> execute();
        
        foreach($resultat as $key => $value) {

    ?>
        <tr>
            <td><?php echo $value['date_reservation']; ?></td>
            <td><?php echo $value['id']; ?></td>
            <td><?php echo $value['prix']; ?></td>
            <td><?php echo $value['statut']; ?></td>
            <td>
                <form method="POST" action="">
                     <input type="hidden" name="id" value="<?php echo $value['id']; ?>" readonly="true">
                     <select name="statut">
                        <option value="">Choisir un motif</option>
                        <option value="Annulation-imprévu">Annulation-imprévu</option>
                        <option value="Annulation-autres">Annulation-autres</option>
                     </select>
                     <button class="btn btn-danger sous-titre text-center" type="submit" name="valider" onclick="return confirm('êtes-vous sûr de vouloir annuler?')">Valider</button>
                </form>
            </td>
        </tr>   
    <?php
    }
    ?>
    </tbody>

</table>

</main>


<aside class="container">

        <div class="col text-center">  
            <a class="lien sous-titre" href="../avis.php" >Je laisse mon avis</a>
        </div>

</aside>

<?php
require 'footer.php';

?>