<?php
$Title='Accueil, Afrique Centrale Découverte.';

include 'include-frontend/header.php';

?>

<section id="recherche" class="container">

        <div id="form-recherche" class="container input-group">
             <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Destination" aria-label="Search">
                <input class="form-control me-2" type="search" placeholder="Depart" aria-label="Search">
                <input class="form-control me-2" type="search" placeholder="Circuits" aria-label="Search">
                <button class="btn btn-primary" type="submit">Recherche</button>
             </form>
        </div>
</section>



<main class="container content">
 

    <article class="container text-center main p-4">
                <h1 class="text-center text-primary">Des voyages à petits prix! </h1>
                <br><br>
        <div class="row row-cols-2 align-items-center"> 
            <div id="info" class="col">
                <h1>De belles natures à découvrir!</h1>
                <br>
                <div id="lien-galerie">
                    <a class="ancre" href="galerie.html">
                        <dl>
                        <dt>Chûte de Boali, Péninsule de Bakassi ...<br></dt>
                        <dd><span>La faune vous reserve beaucoup de surprises.<br> 
                        Accéder à la galérie photos pour visiter quelques lieux.</span></dd>
                    </a>    
                </div>
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

    <article class="container main p-4"> 
                <h1 class="text-center text-primary">A PROPOS </h1>
                <br><br><br>
            <div class="row row-cols-2">
                <div class="col">
                    <img class="img-fluid align-items-center rounded" src="images/image1.png" alt="siege"/> 
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
include 'include-frontend/footer.php';

?>

<script src="bootstrap.bundle.min.js"></script>
</body>
</html>