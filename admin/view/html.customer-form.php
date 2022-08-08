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
                    <form class="form-control form-validation" novalidate action="" method="post">
                        <div class="app-card-body px-4 w-100">
                            <div class="row mb-3">
                                <div class="form-group">
                                    <label>Vous êtes </label>
                                    <label class="radio-inline"><input type="radio" name="gender" value="male" required <?php echo ($client->getGendre() == 'male') ? "checked" : ''; ?>>M.</label>
                                    <label class="radio-inline"><input type="radio" name="gender" value="female" required <?php echo ($client->getGendre() == 'female') ? "checked" : ''; ?>>Mme.</label>
                                    <div class="invalid-feedback"></div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nom">Nom</label>
                                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" value="<?php echo $client->getNom() ?>" required>
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="prenom">Pénom</label>
                                    <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom" value="<?php echo $client->getPrenom() ?>" required>
                                    <div class="invalid-feedback"></div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        </div>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $client->getEmail() ?>" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback"></div>

                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone">Téléphone</label>
                                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Téléphone" value="<?php echo $client->getTelephone() ?>" required>
                                    <div class="invalid-feedback"></div>

                                </div>
                            </div>
                            <?php if ($action == "create") : ?>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="mdp">Mot de passe</label>
                                        <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Mot de passe" required minlength=6>
                                        <a id="togglePassword">
                                            <i class="fa fa-eye-slash icon"></i>
                                        </a>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="mdpConfirm">Confirmer le mot de passe</label>
                                        <input type="password" class="form-control" name="mdpConfirm" id="mdpConfirm" placeholder="Mot de passe" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            <?php endif ?>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="adresse">Adresse</label>
                                    <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Adresse" value="<?php echo $client->getAdresse() ?>" required>
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="ville">Ville</label>
                                    <input type="text" class="form-control" name="ville" id="ville" placeholder="Ville" value="<?php echo $client->getVille() ?>" required>
                                    <div class="invalid-feedback"></div>

                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="codePostal">Code postale</label>
                                    <input type="text" class="form-control" name="codePostal" id="codePostal" placeholder="Code Postal" value="<?php echo $client->getCodePostal() ?>" required>
                                    <div class="invalid-feedback"></div>

                                </div>
                            </div>
                        </div>
                        <div class="app-card-footer p-4 mt-auto">
                            <?php $buttonText = ($action == "create" ? "Créer" : "Mettre à jour"); ?>
                            <button class="btn btn-primary" type="submit" name="submit"><?php echo $buttonText ?></button>
                        </div>

                    </form>
                    <script type="text/javascript">
                        const togglePassword = document.querySelector('#togglePassword');
                        const password = document.querySelector('#mdp');
                        togglePassword.addEventListener('click', function(e) {
                            console.log("here")
                            // toggle the type attribute
                            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                            password.setAttribute('type', type);
                            // toggle the eye / eye slash icon
                            this.getElementsByClassName("icon")[0].classList.toggle('fa-eye');
                            this.getElementsByClassName("icon")[0].classList.toggle('fa-eye-slash');
                            console.log(this.getElementsByClassName("icon")[0]);
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>