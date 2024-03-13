 <!--modification statut reservation-->
 <?php 

require 'connexion.php';

    if(array_key_exists('valider',$_POST)){
                            
        $id_reservation = htmlentities($_POST['id_reservation']);
        $statut = htmlspecialchars($_POST['statut']);
                          
        $req = 'UPDATE agence.reservations  SET statut = :statut WHERE id = :id_reservation LIMIT 1';
        
        $conn -> prepare($req);
                        
        $conn -> binvalue('id, $id_reservation');
        $resultat = $conn -> binvalue('statut',$_POST['statut']);
                       
        $resultat -> execute();

        $message = 'statut réservation mise à jour ! ';
        if($resultat){
        }       
        $message = 'Echec de votre opération !';
    }
        