<?php $title = 'accueil'; ?>

<?php ob_start(); ?>
<!-- <div  id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="../public/img/voyage33.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="10000">
      <img src="../public/img/voyage4.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../public/img/plage.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div> -->
<!-- Début du slider -->
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="public/img/voyage33.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="public/img/voyage4.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="public/img/plage.jpg" class="d-block w-100">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- Fin du slider -->
<!-- Début de bare de reservation  -->
<!-- section reservation -->

<section id="reservation">
  <form class="form-reservation" action="./?path=main&action=sejour" method="POST">

    <select name="ville" id="r-person">
      <option value="">Destination </option>
      <?php foreach ($lesSejours as $sejour) {

        echo '<option name="" value="' . $sejour->getVilleDestination() . '"> ' . $sejour->getVilleDestination() . ' </option>';
      } ?>
    </select>
    <button type="submit" id="r-btn-submit"><b>Rechercher </b> <i class="fa fa-search"></i> </button>
  </form>
</section>



<!-- Fin de bare de reservation  -->

<!-- Début suggestions de destinations -->
<div class="destination">
  <h2>Suggestions De Destinations</h2>

  <div class="scale-section">
    <main>
      <section>
        <figure>
          <a href="./?path=main&action=maroc"><img src="public/img/maroc1.jpg"></a>
        </figure>
        <article>
          <span>Marrakech</span>
          <h1>Dîner et spectacle dans un palais marocain</h1>
          <p>Suivez les anciens sentiers à travers les montagnes berbères Atlas sur une journée au départ de Marrakech. </p>
        </article>
      </section>

      <section>
        <figure>
          <a href="contact.php"><img src="public/img/malaisie.jpg"></a>
        </figure>
        <article>
          <span>Kuala Lumpur</span>
          <h1>Les 12 choses incontournables à faire à Kuala Lumpur</h1>
          <p>On connaît peu de choses à propos de la Malaisie, n’est-ce pas ? </p>
        </article>
      </section>

      <section>
        <figure>
          <a href="contact.php"><img src="public/img/Italie.jpg"></a>
        </figure>
        <article>
          <span>Rome</span>
          <h1>Que faire à Rome? Tourisme & Monuments</h1>
          <p>Que faire à Rome? Rome est une ville regorgeant de musées, de places, de bâtiments de l’époque romaine et autres incontournables.</p>
        </article>
      </section>

      <section>
        <figure>
          <a href="contact.php"><img src="public/img/Amsterdam.jpg"></a>
        </figure>
        <article>
          <span>Helsinki</span>
          <h1>Pourquoi visiter Helsinki ?</h1>
          <p>Helsinki est la capitale et la plus grande ville de la Finlande avec plus de 600 000 habitants.</p>
        </article>
      </section>

      <section>
        <figure>
          <a href="contact.php"><img src="public/img/france.jpg"></a>
        </figure>
        <article>
          <span>France</span>
          <h1>Découvrez Tous Les Visages DE Paris Région</h1>
          <p>Découvrez le meilleur de Paris et sa région : musées, monuments, spectacles, gastronomie, parcs et jardins, adresses shopping.</p>
        </article>
      </section>

      <section>
        <figure>
          <a href="contact.php"><img src="public/img/espagne.png"></a>
        </figure>
        <article>
          <span>Lisbonne</span>
          <h1>À Lisbonne, revivez l'époque des Découvertes</h1>
          <p>lors d’une visite à la Tour de Belém, au Padrão dos Descobrimentos (monument aux Découvertes) et au monastère des Jerónimos.</p>
        </article>
      </section>

    </main>
  </div>

</div>
<!-- fin de suggestions de destinations -->
<!-- Début image background -->
<div class="background_image">
  <img src="public/img/background.jpg" alt="image">
  <div class="texte_centrer "> <p> un voyage de mille lieues commence par un pas</p></div>
</div>

<!-- Section: Icon Boxes -->

<div class="d-flex  justify-content-center p-5 ">
  <div class="container">
    <div class="row text-center fs-4 ">
      <div class="col">
        <div class="card-panel">

          <p><i class="fas fa-store-alt fa-2x"></i></p>


          <h3>Choisir où</h3>
          <p>Planifier mon voyage - Préparer mon voyage.</p>
        </div>
      </div>
      <div class="col m4">
        <div class="card-panel">
          <p><i class="fa fa-plane fa-2x"></i></p>


          <h3>Boutique de voyage</h3>
          <p>J'enregistre les détails de mes
            voyages et je reçois des alertes.</p>
        </div>
      </div>
      <div class="col m4">
        <div class="card-panel">
          <p><i class="fas fa-map-marker-alt fa-2x"></i></p>


          <h3>Voyage pas cher</h3>
          <p> Réserver un voyage pas cher et tout compris.</p>
        </div>
      </div>
    </div>
  </div>
</div>
</section>






<!-- Fin contact us -->
</div>

<div class="mx-auto">
  <!-- <div class="destination">
<h2>CLIP VOYAGE</h2>
</div> -->
  <iframe width="100%" height="650" src="https://www.youtube.com/embed/CC0ywOEAsIE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>


<!-- Fin image background -->
<!-- Début contact us -->
<div class="section">
  <div class="top-border left"></div>
  <div class="top-border right"></div>
  <h1>Contactez-nous</h1>
  <p>Pour nous aider à mieux répondre à vos attentes, n'hésitez pas à nous contacter.
  Besoin d'aide ? Contactez-nous ! Nous reviendrons vers vous sous 48h ouvrées. Pour toute question .
  </p>
  <a href="./?path=main&action=contact">CONTACTEZ-NOUS</a>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>