<?php
$Title='Accueil, Afrique Centrale Découverte.';

require 'include-frontend/header.php';

?>

<section id="recherche" class="container">
        <div id="form-recherche" class="container input-group">
             <form method="POST" action="recherche.php" class="d-flex">
                <input class="form-control me-2" type="search" name="destination" placeholder="Destination" aria-label="Search">
                <input class="form-control me-2" type="search" name="date_depart" placeholder="Date Depart" aria-label="Search">
                <select class="form-control me-2" type="search" name="circuit" aria-label="Search">
                        <option value="">Choisir type Circuit</option>
                        <option value="aller/retour simple">Aller/retour simple</option>
                        <option value="aller/retour simple + hotel">aller/retour simple + hotel</option>
                </select>
                <button class="btn btn-secondary" type="submit">recherche</button>
             </form>
        </div>
</section>

<main class="container content">
 
    <article class="container text-center p-4">
                <h1 class="titre"><b>Des voyages à petits prix!</b></h1>
                <br><br>
        <div class="row row-cols-2 apropos"> 
            <div class="col border" id="info">

                <h3>De belles natures à découvrir!</h3>
                <br>  
                <dl>
                <dt><a class="ancre" href="galerie.html">Chûte de Boali, Péninsule de Bakassi ...</a><br><br><br></dt>
                <dd><span>La faune vous reserve beaucoup de surprises.<br> 
                Accéder à la galérie photos pour visiter quelques lieux.</span></dd>  
            </div>
            <div class="col" id="caroussel">

                <div class="images">
                    <img class="img-fluid" src="images/caroussel/01.png" alt="motel"/>
                    <img class="img-fluid" src="images/caroussel/02.png" alt="faune"/>
                    <img class="img-fluid" src="images/caroussel/03.png" alt="faune"/>
                    <img class="img-fluid" src="images/caroussel/04.png" alt="motel"/>
                    <img class="img-fluid" src="images/caroussel/06.png" alt="motel"/>
                </div>
            </div>
        </div>
    </article>

    <article class="container text-center p-4"> 
                <h2 class="titre"><b>A Propos</b></h2>
                <br><br>
            <div class="row row-cols-2">

                <div class="col">
                    <img class="img-fluid rounded" src="images/image1.png" alt="siege"/> 
                </div> 
                
                <div class="col">
                    <p><em> Qui sommes-nous ?</em><p>
                    <p><b>Afrique Centrale Découverte</b> est une jeune agence de voyage, 
                        basée à Bangui <b>Centrafrique</b>, nous aurons des bureaux bientôt dans quelques pays de 
                        la sous région, avec objectif de proposer des voyages aux <b>Personnes</b> 
                        souhaitant découvrir <b>la foret équatoriale et sa belle nature.</b>
                    </p> 
                </div>                   
   
            </div>   
    </article>   

</main>


<?php
require 'include-frontend/footer.php';

?>

<script src="bootstrap.bundle.min.js"></script>
</body>
</html>