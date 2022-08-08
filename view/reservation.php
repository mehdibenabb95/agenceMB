<?php $title = 'reservation'; ?>

<?php ob_start(); ?>

<!-- Début du formulaire de reservation  -->
<!-- Début du formulaire de reservation  -->
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="col-12 col-lg-12 ">
                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                    <div class="app-card-header p-3 border-bottom-0 ">
                        <div class="row align-items-center gx-3">
                            <div class="col-auto">
                                <h4 class="app-card-title "></h4>
                            </div>
                        </div>
                    </div>
                    <form class="form-control form-validation  bg-warning" novalidate action="./?path=customer&action=traitement_reservation" method="post" enctype="multipart/form-data">
                        <?php if (isset($_SESSION["error"]) && $_SESSION["error"]) : ?>
                            <div class="alert alert-danger"><?php echo $_SESSION["error"]; ?></div>
                            <?php unset($_SESSION["error"]); ?>
                        <?php endif; ?>
                        <?php if (isset($_SESSION["success"]) && $_SESSION["success"]) : ?>
                            <div class="alert alert-success"><?php echo $_SESSION["success"]; ?></div>
                            <?php unset($_SESSION["success"]); ?>
                        <?php endif; ?>
                        <div class="app-card-body px-4 w-100 ">
                            <div class="row">
                     
                            <div class="col-md-4 mb-3">
                                    <label for="sejour">Séjour</label>
                                    <select class="form-select" aria-label="Default select example" name="sejour" id="sejour" required onchange="">
                                        <option value="">-- Veuillez séléctionner un séjour</option>
                                        
                                            <option <?php if (isset($idSejour) && $leSejour->getIdSejour() == $idSejour) {
                                                echo 'selected';
                                                
                                            } ?> value="<?= $leSejour->getIdSejour() ?>"><?= $leSejour->getVilleDestination() ?></option>
                                        
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="nbplaces">Nombre de places</label>
                                    <input type="number" class="form-control" name="nbplaces" id="place" placeholder="places totales" value="" min ="1">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="prixUnitaire">Prix Unitaire</label>
                                    <input disabled type="text" class="form-control" name="prixUnitaire" id="prixUnitaire" placeholder="prixUnitaire" value="<?= $leSejour->getPrix() ?>" >
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="prixTotal">Prix Total</label>
                                    <input type="text" class="form-control" name="prixTotal" id="prixTotal" placeholder="prixTotal" value="<?= $leSejour->getPrix() ?> " readonly >
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            
                           

                        </div>
                        <div class="app-card-footer p-4 mt-auto">

                            <button class="btn btn-success" type="submit" name="submit">valider</button>
                        </div>

                    </form>
                    <script type="text/javascript">
                        function setPrix() {
                            var places = document.getElementById("place").value;
                            console.log(places);
                            var sejour = document.getElementById("sejour");
                            console.log(sejour);
                            console.log(sejour.options[sejour.selectedIndex]);
                            // var price = sejour.options[sejour.selectedIndex].getAttribute('data-price');
                            var price = document.getElementById("prixUnitaire").value
                            console.log(price);
                            prixTotal = places * price;
                            document.getElementById("prixTotal").value = prixTotal;


                        }
                        document.getElementById('place').addEventListener('input', function() {

                            setPrix();

                        })
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>