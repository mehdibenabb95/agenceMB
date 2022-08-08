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
                                    <label for="titre">Titre</label>
                                    <input type="text" class="form-control" name="titre" id="titre" placeholder="Titre" value="<?= $descriptionSejour->getTitre() ?>">
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" id="image" value="">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="titreImage">Titre Image</label>
                                    <input type="text" class="form-control" name="titreImage" id="titreImage" placeholder="titre Image" value="<?= $descriptionSejour->getTitreImage() ?>" >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="numOrdre">Numero Ordre</label>
                                    <input type="number" class="form-control" name="numOrdre" id="numOrdre" placeholder="Numero Ordre" value="" required>
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="col-md-6 mb-5 ">

                                    <div class="invalid-feedback"></div>
                                    <select class="form-select" type="text" aria-label="Default select example" name="idSejour" id="idSejour" required onchange="">
                                        <option value="">-- Veuillez séléctionner un séjour</option>
                                        <?php foreach ($lesSejours as $sejour) : ?>
                                            <option value="<?= $sejour->getIdSejour() ?>"><?= $sejour->getVilleDestination() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="texte">Déscription</label>
                                <textarea class="form-control" name="texte" id="texte" cols="30" rows="6"><?= $descriptionSejour->getTexte() ?></textarea>
                                <div class="invalid-feedback"></div>
                            </div>


                        </div>
                        <div class="app-card-footer p-4 mt-auto">
                            <?php $buttonText = ($action == "create" ? "Créer" : "Mettre à jour"); ?>
                            <button class="btn btn-primary" type="submit" name="submit"><?php echo $buttonText ?></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>