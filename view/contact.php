
<?php $title = 'contact'; ?>

<?php ob_start(); ?>
<div class="container_c bg bg-warning p-4">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 m-auto">
			<div class="contact-form">
				<h1>Contactez-Nous</h1>
				<form action="" method="post">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="inputName">Name</label>
								<input type="text" class="form-control" id="inputName" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="inputEmail">Email</label>
								<input type="email" class="form-control" id="inputEmail" required>
							</div>
						</div>
					</div>            
					<div class="form-group">
						<label for="inputSubject">Subject</label>
						<input type="text" class="form-control" id="inputSubject" required>
					</div>
					<div class="form-group">
						<label for="inputMessage">Message</label>
						<textarea class="form-control" id="inputMessage" rows="5" required></textarea>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i>envoyer</button>
					</div>            
				</form>
			</div>
		</div>
	</div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

