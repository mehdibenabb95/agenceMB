<?php
$title = 'mesreservations'; ?>

<?php ob_start(); ?>

<?php foreach ($lesReservations as $uneReservation) :
    $leSejour = $recherchesejour->getSejourById($uneReservation->getIdSejour());
?>

    <div class="container rounded bg-white mt-5 mb-5 ">
    <?php if (isset($_SESSION["success"]) && $_SESSION["success"]) : ?>
    <div class="alert alert-success col-8"><?php echo $_SESSION["success"]; ?></div>
    <?php unset($_SESSION["success"]); ?>
<?php endif; ?>
        <div class="row">

            <div class="col-md-3 border-right">
                <img src="public/img/1.jpg" alt="">


            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Mes reservations</h4>
                    </div>
                    <hr>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="">Nom : <?= $customers->getNom() ?> </div>
                        <div class="col-md-6"><label class="">Prenom : <?= $customers->getPrenom() ?></div>

                    </div>
                    <hr>

                    <div class="row mt-3">

                        <div class="col-md-6"><label class="">Séjour: <?= $leSejour->getVilleDestination() ?> </div>


                    </div>
                    <hr>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="">Nombre de places: <?= $uneReservation->getNbPlaces() ?> </div>
                        <div class="col-md-6"><label class="">Prix : <?= $uneReservation->getPrix() ?> </div>

                    </div>


                    <a name="update" class="btn btn-warning mt-5 mr-2 text-center" role="button" href="./?path=customer&action=edit-reservation&id=<?= $uneReservation->getIdReservation() ?>">CONSULTER</a>
                    <a name="update" class="btn btn-success mt-5  text-center" role="button" href="./?path=customer&action=delete-reservation&idReservation=<?= $uneReservation->getIdReservation() ?>">Supprimer</a>

                </div>
            </div>

        </div>

    </div>
<?php endforeach; ?>
</div>
</div>





<?php $content = ob_get_clean();
require('template.php');

?>