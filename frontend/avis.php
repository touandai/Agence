<?php
$Title='Avis clients, Afrique Centrale Découverte';

include 'include-frontend/header.php';


?>

<h1 class="text-center">Avis</h1> 


<main class="container avis">

        <section class="btn-secondary" id="dropdownMenuButton" data-toggle="dropdown">
                 
                <form class="form" method="POST" action="">
                                            
                       <fieldset>
                            <legend>Laissez-nous votre avis</legend>
                            <br>
                            <div>
                                <label class="form-label">Pseudo / Nom :</label>
                                <input class="form-control" type="text" name="nom" placeholder="Martin" required/>
                            </div>
                            <div>
                                <label class="form-label">Note :</label>
                                <input class="form-control" type="number" min="0" max="10" name="note" placeholder="choisir une note entre 0 et 10" required/>
                            </div>
                            <div>
                                <label class="form-label">Commentaire :</label>
                                <textarea class="form-control"  name="commentaire" placeholder="votre message ici" required/></textarea>

                            </div>
                            <br>
                                <button class="btn btn-secondary" name="valider" type="submit">Valider</button>
                            </div>
                            
                        </fieldset>
                </form> 
        </section>

</main>

<?php
include 'include-frontend/footer.php';

?>