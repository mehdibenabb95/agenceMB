<?php $title = 'login'; ?>

<?php ob_start(); ?>

<?php if (isset($_SESSION["error"]) && $_SESSION["error"]) : ?>
	<div class="alert alert-warning"><?php echo $_SESSION["error"]; ?></div>
	<?php unset($_SESSION["error"]); ?>
<?php endif; ?>
<?php if (isset($_SESSION["success"]) && $_SESSION["success"]) : ?>
	<div class="alert alert-info"><?php echo $_SESSION["success"]; ?></div>
	<?php unset($_SESSION["success"]); ?>
<?php endif; ?>
<div class="app-auth-wrapper ">
	<div class=" col-md-10 col-lg-6 col-sm-12  mx-auto text-center p-3">
		<div></div>
		<div class="login  ">
			<div class="app-auth-body">
				<div class="app-auth-branding"><a class="app-logo"><img class="logo-icon" src="public/img/app-logo.svg" alt="logo"></a></div>
				<h2 class="auth-heading mb-5">Se connecter</h2>

				<form class="auth-form login-form" method="POST" action="./?path=main&action=login-traitement">
					<div class="email mb-3">
						<label class="sr-only" for="email">Email</label>
						<input id="email" name="email" type="email" class="form-control email" placeholder="Adresse Email" required="required">
					</div>
					<div class="password mb-3">
						<label class="sr-only" for="mdp">Mot de passe</label>
						<input id="mdp" name="mdp" type="password" class="form-control password" placeholder="Mot de passe" required="required">
						<div class="extra mt-3 row justify-content-between">
							<div class="col-6">
							</div>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-warning w-100 theme-btn mx-auto ">Se connecter</button>
						</div>
						<div class="text-center pt-2">
							<a class="btn btn-success w-100 theme-btn mx-auto" role="button" href="./?path=main&action=inscription">S'inscrire</a>
						</div>
				</form>
			</div>
		</div>
	</div>

</div>






<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>