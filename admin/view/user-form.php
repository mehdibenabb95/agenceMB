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
                                <div class="col-md-4 mb-3">
                                    <label for="nom">Nom</label>
                                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" value="<?= $admin->getNom()?>" required>
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="prenom">Prenom</label>
                                    <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prenom" value="<?= $admin->getPrenom()?>" required>
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="<?= $admin->getEmail()?>" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="mdp">Mot de passe</label>
                                    <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Mot de passe" value="" required minlength="6">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="mdp">Confirmation de mot de passe</label>
                                    <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Mot de passe" value="" required minlength="6">
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