<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="col-12 col-lg-12">
                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                    <div class="app-card-header p-3 border-bottom-0">
                        <div class="row align-items-center gx-3">
                            <div class="col-auto">
                                <h4 class="app-card-title"><?php echo ucfirst($title); ?></h4>
                            </div>
                        </div>
                    </div>
                    <form class="form-control form-validation" novalidate action="" method="post" enctype="multipart/form-data">
                        <div class="app-card-body px-4 w-100">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control" name="code" id="code" placeholder="Code" value="<?php echo $sejour->getCode()? $sejour->getCode(): $sejourManager->getNextCode(); ?>" required>
                                    <div class="invalid-feedback"></div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="villeDepart">Ville de départ</label>
                                    <input type="text" class="form-control" name="villeDepart" id="villeDepart" placeholder="Ville départ" value="<?php echo $sejour->getVilleDepart() ?>" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="villeDestination">Ville de destination</label>
                                    <input type="tel" class="form-control" name="villeDestination" id="villeDestination" placeholder="Ville destination" value="<?php echo $sejour->getVilleDestination() ?>" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="dateDepart">Date de départ</label>
                                    <input type="date" class="form-control" name="dateDepart" id="dateDepart" placeholder="Date de départ" value="<?php echo $sejour->getDateDepart() ?>" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="dateArrivee">Date d'arrivée</label>
                                    <input type="date" class="form-control" name="dateArrivee" id="dateArrivee" placeholder="Date d'arrivée" value="<?php echo $sejour->getDateArrivee() ?>" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="placeTotal">Nombre total de places</label>
                                    <input type="text" class="form-control" name="placeTotal" id="placeTotal" placeholder="places totales" value="<?php echo $sejour->getPlaceTotal() ?>" required>
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="placeLibre">Nombre de places diponibles</label>
                                    <input type="text" class="form-control" name="placeLibre" id="placeLibre" placeholder="places disponible" value="<?php echo $sejour->getPlaceLibre() ?>" required>
                                    <div class="invalid-feedback"></div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="prix">Prix</label>
                                    <input type="text" class="form-control" name="prix" id="prix" placeholder="Prix" value="<?php echo $sejour->getPrix() ?>" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" id="image" value="<?php echo $sejour->getImage() ?>">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-6 mb-3">
                                    <label for="description">Déscription</label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="6"><?php echo $sejour->getDescription() ?></textarea>
                                    <div class="invalid-feedback"></div>
                                </div>
                                </div>
                        </div>
                        <div class="app-card-footer p-4 mt-auto">
                            <?php $buttonText = ($action == "create"? "Créer" : "Mettre à jour"); ?>
                            <button class="btn btn-primary" type="submit" name="submit"><?php echo $buttonText ?></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>