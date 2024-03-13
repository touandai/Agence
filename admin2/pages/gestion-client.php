<?php
$Title ="Gérer les clients";

require 'include/header.php';
require 'include/entete.php';
require 'include/menu-nav.php';

require 'connexion.php';

if(array_key_exists('valider',$_POST))  {
    
    $id = $_POST['id'];
    $reqsupp = 'DELETE FROM agence.client WHERE id = :id';
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

<main class="contenaire content">
    <section class="container circuit">
        <table class="table table-striped table-bordered">
            <caption>Gestion clients</caption>
                <thead>
                        <tr>
                            <th>Id</th>
                            <th>Civilité</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Age</th>
                            <th>Nationalité</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Date d'inscription</th>
                            <th>Statut/Action</th>
                        </tr>
                </thead>
                  
                <tbody>
                    <?php
                        $reqselect = "SELECT * FROM agence.client ORDER BY date_inscription ASC LIMIT 5";
                        $reqselect = $conn -> query ($reqselect);
                        $resultat = $reqselect-> fetchAll();
                        foreach($resultat as $key => $value) {
                    ?>
                   <tr>
                      <td><?php echo $value['id'];?></td>
                      <td><?php echo $value['civilite'];?></td>
                      <td><?php echo $value['nom'];?></td>
                      <td><?php echo $value['prenom'];?></td>
                      <td><?php echo $value['age'];?></td>
                      <td><?php echo $value['nationalite'];?></td>
                      <td><?php echo $value['telephone'];?></td>
                      <td><?php echo $value['email'];?></td>
                      <td><?php echo $value['date_inscription'];?></td>
                      <td>
                        <form method="POST" action=""> 
                            <input type="hidden" name="id" value="<?php echo $value['id']; ?>" readonly="true">
                            <button class="btn btn-danger"  type="submit" name="valider" onclick="return confirm('Vous confirmez cette suppression <?php echo $value['id']; ?> ?')">supprimer</button>
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