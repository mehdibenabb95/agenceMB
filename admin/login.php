<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Mon agence</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="Mon agence">
	<meta name="author" content="Benabbou Mehdi">
	<link rel="shortcut icon" href="avion.ico">

	<!-- Bootstrap 5-->
	<link id="theme-style" rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

	<!-- FontAwesome JS-->
	<script defer src="assets/fonts/fontawesome/js/all.min.js"></script>

	<!-- App CSS -->
	<link id="theme-style" rel="stylesheet" href="assets/css/style.css">

</head>

<body class="app app-login p-0">
	<div class="row g-0 app-auth-wrapper">
		<div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
			<?php
			//var_dump($_SESSION);
			if (isset($_SESSION['error'])) { ?>

				<div class="toast show align-items-center text-white bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
					<div class="d-flex">
						<div class="toast-body">
							<?php echo $_SESSION["error"]; ?>
						</div>
						<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
					</div>
				</div>

			<?php
				unset($_SESSION['error']);
			}
			if (isset($_SESSION['success'])) { ?>

				<div class="toast show align-items-center text-white bg-success" role="alert" aria-live="assertive" aria-atomic="true">
					<div class="d-flex">
						<div class="toast-body">
							<?php echo $_SESSION["success"]; ?>
						</div>
						<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
					</div>
				</div>

			<?php
				unset($_SESSION['success']);
			}
			?>
			<div class="d-flex flex-column align-content-end">
				<div class="app-auth-body mx-auto">
					<div class="app-auth-branding"><a class="app-logo"><img class="logo-icon" src="assets/images/app-logo.svg" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-5">Se connecter à Mon agence</h2>
					<div class="auth-form-container text-start">
						<form class="auth-form login-form" method="post" action="handleCon.php">
							<div class="email mb-3">
								<label class="sr-only" for="email">Email</label>
								<input id="email" name="email" type="email" class="form-control email" placeholder="Adresse EMAIL" required="required">
							</div>
							<div class="password mb-3">
								<label class="sr-only" for="mdp">Mot de passe</label>
								<input id="mdp" name="mdp" type="password" class="form-control password" placeholder="Mot de passe" required="required">
								<div class="extra mt-3 row justify-content-between">
									<div class="col-6">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value="" id="RememberPassword">
											<label class="form-check-label" for="RememberPassword">
												se souvenir de moi
											</label>
										</div>
									</div>
									<div class="col-6">
										<div class="forgot-password text-end">
											<a href="reset-password.php">Mot de passe oublié?</a>
										</div>
									</div>
								</div>
							</div>
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Se connecter</button>
							</div>
						</form>
					</div>

				</div>

				<footer class="app-auth-footer">
					<div class="container text-center py-3">
						<small class="copyright">Mehdi Benabbou © 2021</small>

					</div>
				</footer>
			</div>
		</div>
		<div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
			<div class="auth-background-holder">
			</div>
			<div class="auth-background-mask"></div>
		</div>
	</div>
	<script src="assets/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript">
		var toastElList = [].slice.call(document.querySelectorAll('.toast'))
		var toastList = toastElList.map(function(toastEl) {
			var ele = new bootstrap.Toast(toastEl);
    		setTimeout(function() { toastEl.className = toastEl.className.replace("show", ""); }, 5000);
    		return ele;		})
	</script>
</body>

</html>