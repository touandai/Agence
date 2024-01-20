
<div class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        
             
        <form class="form" method="POST" action="">
                                     
            <fieldset>
                <legend>Laissez-nous votre avis</legend>
                    <br>
                    <div>
                        <label class="form-label">Note :</label>
                        <input class="form-control" type="number" min="0" max="10" name="note" placeholder="choisir une note entre 0 et 10" required/>
                    </div>
                    <div>
                        <label class="form-label">Commentaire :</label>
                        <textarea class="form-control"  name="commentaire" placeholder="votre message ici" required/></textarea>

                    </div>
                    <br>
                        <button class="btn btn-primary" name="valider" type="submit">Envoyer</button>
                    </div>
                     
                </fieldset>
            </form> 
         </div>

<?php 
include 'footer.php';