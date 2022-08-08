<?php $title = 'profilcustomer'; ?>
<?php ob_start(); ?>
<div class="container-fluid mt-5">

    <div class=" profil row justify-content-center">

        <div class="profil col-md-3 border border-4 ">
            <img src="public/img/profil.png" alt="">
        </div>
        <div class="col-6  ">
            <?php if (isset($_SESSION["success"]) && $_SESSION["success"]) : ?>
                <div class="alert alert-info"><?php echo $_SESSION["success"]; ?></div>
                <?php unset($_SESSION["success"]); ?>
            <?php endif; ?>
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profil Client</h4>
                </div>
                <hr>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="">Nom : <?= $customers->getNom() ?></div>
                    <div class="col-md-6"><label class="">Prenom : <?= $customers->getPrenom() ?></div>
                </div>
                <hr>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="">Téléphone : <?= $customers->getTelephone() ?> </div>
                    <div class="col-md-6"><label class="">Ville : <?= $customers->getVille() ?></div>

                </div>
                <hr>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="">Addresse : <?= $customers->getAdresse() ?></div>
                    <div class="col-md-6"><label class="">Code Postal : <?= $customers->getCodePostal() ?></div>
                </div>

                <hr>
                <div class="row mt-3">

                    <div class="col-md-6"><label class="">Email : <?= $customers->getEmail() ?></div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <a name="update" class="btn btn-warning mt-3  text-center" role="button" href="./?path=customer&action=editform-inscription&id=<?= $customers->getIdCustomer() ?>">Modifier</a>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>




<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>














<!-- 
<div class="col-3">
                        <a name="update" class="btn btn-danger mt-3  text-center" role="button" href="./?path=customer&action=delete-customer&id=<?= $customers->getIdCustomer() ?>">Supprimer</a>
                    </div> -->