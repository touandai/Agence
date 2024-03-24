<?php
//demarrage session//
require 'tableau-de-bord-menu.php';

require '../connexion.php';

    if(array_key_exists('valider',$_POST)){
        
        function validationDonnees($donnees){
            $donnees = trim($donnees);
            $donnees = stripslashes($donnees);
            $donnees = htmlspecialchars($donnees);
            return $donnees;
            }
                                
            $id = validationDonnees($_POST['id']);
            $statut = validationDonnees($_POST['statut']);
            $date = date('Y-m-d h:m:s');

            $reqAnnul = 'UPDATE agence.reservations SET statut = :statut, date_annulation =:date WHERE id = :id';
            $valider = $conn -> prepare ($reqAnnul);

            $valider -> bindValue(':id',$id);
            $valider -> bindValue(':statut',$statut);
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
    <?php
        if(isset($_GET['succes']) && ($_GET['succes'] == 1)) {
    ?>
    <div style="padding: 20px;color: #ffffff;background: red;text-align:center;">
    Votre demande d'annulation a été bien prise en compte!</div>
    <?php
    }
    ?>

<p class="text-center span"></p>
<br>



<table class="table table-striped table-bordered">
    <thead>
            <tr>
                <th  class="text-center">Date</th>
                <th  class="text-center">Référence Reservation</th>
                <th  class="text-center">Prix</th>
                <th  class="text-center">Statut</th>
                <th  class="text-center">Actions</th>
            </tr>
    </thead>

    <tbody>

    <?php
    
        $id= $clientConnecte['id'];
        $req = 'SELECT date_reservation, id, prix, statut FROM agence.reservations
                WHERE id_client = :id_client LIMIT 3';
        $resultat = $conn -> prepare ($req);
        $resultat -> bindvalue(':id_client', $id);
        $resultat -> execute();
        
        foreach($resultat as $key => $value) {

    ?>
        <tr>
            <td class="text-center"><?php
                    setlocale(LC_TIME,'fr');
                    $date = strftime('%d/%m/%Y',strtotime($value['date_reservation']));
                    echo $date ?>
            </td>
            <td class="text-center"><?php echo $value['id']; ?></td>
            <td class="text-center"><?php echo $value['prix']; ?></td>
            <td class="text-center">
                <?php
                $statut = $value['statut'];
                if($statut =='En cours de traitement'){
                    echo "<strong class='warning'> $statut </strong>";
                }
                elseif ($statut =='Confirmée'){
                    echo"<strong class='succes'> $statut </strong>";
                }
                else {
                    echo "<strong class='red'> $statut </strong>";
                }
                ?>
            </td>
            <td>
                <form class="text-center" method="POST" action="">
                     <input type="hidden" name="id" value="<?php echo $value['id']; ?>" readonly="true">
                     <select name="statut">
                        <option value="">Choisir motif d'annulation</option>
                        <option value="Annulation-imprévu">Annulation-imprévu</option>
                        <option value="Annulation-autres">Annulation-autres</option>
                     </select>
                     <button class="btn btn-danger btn-sm sous-titre text-center" type="submit" name="valider"
                     onclick="return confirm('êtes-vous sûr de vouloir annuler?')">Valider</button>
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