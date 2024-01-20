<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Agence de voyages">
    <title>Accueil, Afrique Centrale Découverte</title>
    <link rel="stylesheet" href="assets/bootstrap.icons.min.css">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="scss/style.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>

<div class="container entete"> 
        <div>
            <img class="rounded" src="images/log101.png" alt="logo"/>
        </div>
        <div>
            <em>De nouvelles destinations bientôt disponibles !</em>
        </div>  
</div>    

<header>        
        <nav id="menu" class="navbar navbar-expand-md bg-light" data-bs-theme="white">
            <div class="container-fluid">
                    <img class="navbar-brand" src="images/afrique1.jpg" alt="logo"/>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Destinations</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Séjours</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Galéries photos</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Circuits et Bons plans</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Connexion</a></li>
                </ul>
            </div>
        </nav>    
</header>

<div id="recherche" class="container">

        <div id="form" class="container input-group">
             <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Destination" aria-label="Search">
                <input class="form-control me-2" type="search" placeholder="Depart" aria-label="Search">
                <input class="form-control me-2" type="search" placeholder="Circuits" aria-label="Search">
                <button class="btn btn-primary" type="submit">Recherche</button>
             </form>
        </div>
</div>



<main class="container content">
 

<article class="container text-center p-4">

    <div class="row row-cols-2 align-items-center"> 

        <div id="info" class="col">
            <h1>Des voyages à des prix attractifs</h1>
            <br>
            <a class="ancre" href="galerie.html"><p>De belles natures à découvrir!</p></a><br>
            <div>
                
                <dl>
                 <dt>Chûte de Boali, Péninsule de Bakassi ...<br></dt>
                <dd><span>La faune vous reserve beaucoup de surprises.</span></dd>
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
                <br>
            <div class="row row-cols-2 align-items-center">
                <div class="col">
                    <img class="img-fluid align-items-center rounded" src="images/image1.png" alt="siege"/> 
                </div> 
                <div class="col">
                    <p><em> Qui sommes-nous ?</em><p>
                    <p><b>Afrique Centrale Découverte</b> est une jeune agence de voyage, 
                        basé à Bangui <b>Centrafrique</b>, nous aurons des bureaux bientôt dans quelques pays de 
                        la sous région, averc objectif de proposer des voyages aux <b>passionnées</b> 
                        de la foret équatoriale.
                    </p> 
                </div>                   
   
            </div>   
    </article>   

</main>

<section class="container section">
    <div>
        <p class="text-centre">S'informer sur les actualités politiques, 
            économique et sécuritaires de la sous région ?
        </p>
    <div>  
    <div>

    </div>      
</section>

<aside id="aside" class="container">
    <div>
        <p class="text-centre"><b>Les derniers avis de nos clients</b></p>

        <?php ?>
    </div>
    <div class="reseaux-sociaux">
        <div>
            <p class="text-centre"><b>Suivez-nous sur les réseaux sociaux</b></p>
            <pre>
            <a href="#"><img src="images/fb.png" alt="facebook"/></a>
      <a href="#"><a href=""><img src="images/whatapps.png" alt="whatapps"/></a>        <a href="#"><img src="images/twiter.png" alt="twiter" /></a>
            <a href="#"><img src="images/tiktok.png" alt="tiktok"/></a>       
            </pre>
        </div>    
    </div>
</aside>

<footer id="footer" class="container-fluid footer">
            <div class="element">
                <a class="element" href="politique.html">Politiques de confidentialité</a>
            </div>
            <div class="element">
                <a class="element" href="cgv.html">CGV</a>
            </div>
            <div class="element">
                <a class="element" href="contact.php">Contact</a>
            </div>
            <div class="element">
                <a class="element" href="https://cemac.int/">Liens Utiles</a>
            </div>
</footer>

<script src="bootstrap.bundle.min.js"></script>
</body>
</html>