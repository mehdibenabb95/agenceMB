<?php $title = 'sejour'; ?>
<?php ob_start();
?>
<div class="container-fluid">
  <section id="reservation">
    <form class="form-reservation" action="./?path=main&action=sejour" method="POST">
      <select name="ville">
        <option value="">Destination </option>
        <?php foreach ($lesSejours as $sejour) {
          echo '<option name="" value="' . $sejour->getVilleDestination() . '"> ' . $sejour->getVilleDestination() . ' </option>';
        }
        echo '<option  value=""> Tous les sejours  </option>'; ?>
      </select>
      <button type="submit" id="r-btn-submit"><b>Rechercher </b> <i class="fa fa-search"></i> </button>
    </form>
  </section>
  <div class="row">
    <?php foreach ($sejours as $sejour) : ?>
      <div class=" col col-sm-12 col-md-6 col-lg-3 p-2 m-4 mx-auto shadow">
        <div class="card-body">
          <div class="reservation">
            <img src="./public/img/<?= $sejour->getImage() ?>" class="card-img-top" alt="...">
            <div class="card-body ">
              <h2 class="card-title"> <?= $sejour->getVilleDestination() ?> </h2>
              <p class="card-nbPlace"> <b> Nombre de Place : </b><?= $sejour->getPlaceLibre() ?></p>
              <p class="card-datedepart"> <b> Depart : </b><?= date("d-m-Y",strtotime($sejour->getDateDepart())) ?></p>
              <p class="card-dateretour"> <b> Retour : </b><?= date("d-m-Y",strtotime($sejour->getDateArrivee())) ?></p>
              <p class="card-text"> <b> Déxcription : </b><?= $sejour->getDescription() ?></p>
              <div class="price text-danger fs-1 fw-bold fst-italic "> <?= $sejour->getPrix() ?> €</div>
              <div class="sejourBTN">
                <?php if (isset($_SESSION['role'])) : ?>
                  <?php if ($_SESSION['role'] == 'customer') :    ?>
                    <a class="btn btn-primary" href="./?path=customer&action=reservation&idSejour=<?= $sejour->getIdSejour() ?>">Reserver</a>
                <?php endif; ?>
                <?php endif; ?>
                <?php if (!isset($_SESSION['role'])) : ?>
                <a class="btn btn-primary" href="./?path=main&action=login">Reserver</a>
                <?php endif; ?>
                <a class="btn btn-success" href="./?path=main&action=description&idSejour=<?= $sejour->getIdSejour() ?>">Lire la suite</a>
              </div>
              </p>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>
<?php echo ('<div class="row">');
?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>