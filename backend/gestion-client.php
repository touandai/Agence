<?php
$Title ="Gérer les clients";

require 'include/header.php';
require 'include/entete.php';
require 'include/menu-nav.php';

require 'connexion.php';

if(array_key_exists('valider',$_POST))  {
    
    $id = $_POST['id'];
    $reqsupp = 'DELETE FROM agence.clients WHERE id = :id';
    $statment = $conn -> prepare($reqsupp);
    $statment -> bindValue(':id',$id);
    $supp =  $statment -> execute();
    
    //condition si le client a déjà réservé//
    if($supp) {
        header('location:?gestion-client&suppression=1');
        exit();
    }

}

?>
<br>
<h2 class="text-center">Gestion des Clients</h2>

<main class="container">
    <?php
    if(isset($_GET['suppression']) && ($_GET['suppression'] == 1)) {
    ?>
    <div style="padding: 20px;color: #ffffff;background: red;text-align:center;"><b>Le client a été supprimé !</b></div>
    <?php
    }
    ?>
    <section class="container circuit">
        <table class="table table-striped table-bordered">
            <caption>Gestion clients</caption>
                <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Civilité</th>
                            <th class="text-center">Nom</th>
                            <th class="text-center">Prenom</th>
                            <th class="text-center">Age</th>
                            <th class="text-center">Nationalité</th>
                            <th class="text-center">Téléphone</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Date d'inscription</th>
                            <th class="text-center">Statut/Action</th>
                        </tr>
                </thead>
                  
                <tbody>
                    <?php
                        $reqselect = "SELECT * FROM agence.clients ORDER BY date_inscription DESC LIMIT 5";
                        $reqselect = $conn -> query ($reqselect);
                        $resultat = $reqselect-> fetchAll();
                        foreach($resultat as $key => $value) {
                    ?>
                   <tr>
                      <td class="text-centre"><?php echo $value['id'];?></td>
                      <td class="text-centre"><?php echo $value['civilite'];?></td>
                      <td class="text-centre"><?php echo $value['nom'];?></td>
                      <td class="text-centre"><?php echo $value['prenom'];?></td>
                      <td class="text-centre"><?php echo $value['age'];?></td>
                      <td class="text-centre"><?php echo $value['nationalite'];?></td>
                      <td class="text-centre"><?php echo $value['telephone'];?></td>
                      <td class="text-centre"><?php echo $value['email'];?></td>
                      <td class="text-centre"><?php
                          setlocale(LC_TIME,'fr');
                          $datefr = strftime('%d/%m/%Y',strtotime($value['date_inscription']));
                          echo $datefr ?>
                      <td class="text-centre">
                        <form method="POST" action="">
                            <input type="hidden" name="id" value="<?php echo $value['id']; ?>" readonly="true">

                            <button class="btn btn-danger btn-sm"  type="submit" name="valider"
                            onclick="return confirm('Vous confirmez cette suppression <?php echo $value['id']; ?> ?')">
                            supprimer</button>
                        </form>
                      </td>
                  </tr>
                <?php
                }
                ?>
                </tbody>
        </table>      
    </section>   

    <div class="text-center">
        <a class="lien" href="ajout-client.php">Ajouter des clients </a>
    </div>
    

</main>



<?php
include 'include/footer.php';

?>