<?php $title = 'livredor'; ?>

<?php ob_start(); ?>





<!-- Début de blog view -->

</div>

<section>
	<div class="container">
		<div class="row">
			
			<div class="col-sm-5 col-md-6 col-12 pb-4 comment">
				<h1>Vos Avis</h1>
				<?php if (isset($_SESSION['success']) && $_SESSION['success']) : ?>
						<div class="alert alert-danger"> <?= $_SESSION['success']; ?></div>
						<?php unset($_SESSION['success']); ?>
					<?php endif; ?>
				<?php foreach ($lesBlogs as $leblog) : ?>
					<div class="comment1 mt-4 text-justify float-left "> <img src="https://i.imgur.com/yTFUilP.jpg" alt="" class="rounded-circle" width="45" height="40">
						<?php $lecustomer = $objetCustomerById->getCustomerById($leblog->getIdCustomer());
						?>
						<h4><?= $lecustomer->getNom() . ' ' . $lecustomer->getPrenom() ?></h4> <span>- <?= $leblog->getDateBlog() ?> </span> <br>


						<?php $leSejour = $recherchesejour->getSejourById($leblog->getIdSejour());
						 
						?>
						<h5><?= $leSejour->getVilleDestination() ?></h5>

						<p> <?= $leblog->getDescriptionBlog() ?></p>
						<?php if(isset($_SESSION['role'])) : ?>
							<?php if($_SESSION['role'] == 'customer') : ?>
					<a class="btn btn-danger" href="./?path=main&action=delete-livredor&idBlog=<?= $leblog->getIdBlog() ?>">supprimer</a>
					<?php endif; ?>
					<?php endif; ?>
					</div>
				<?php endforeach; ?>

			</div>

			<!-- Fin de blog view -->


			<!-- Début de form -->

			<?php if(isset($_SESSION['role'])) : ?>
							<?php if($_SESSION['role'] == 'customer') : ?>
			<div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">

				<form id="algin-form" action="./?path=main&action=traitement-blog" method="post">
					
						
					<select class="form-select" type="text" aria-label="Default select example" name="idSejour" id="idSejour" required onchange="">
						<option value="">-- Veuillez séléctionner un séjour</option>
						<?php foreach ($lesSejours as $sejour) : ?>
							<option value="<?= $sejour->getIdSejour() ?>"><?= $sejour->getVilleDestination() ?></option>
						<?php endforeach; ?>
					</select>
					<div class="form-group">

						<label for="descriptionBlog">Message</label>
						<textarea name="descriptionBlog" type="text" id="descriptionBlog" msg cols="30" rows="5" class="form-control" minlength="2" maxlength="200"></textarea>
					</div>


					<div class="invalid-feedback"></div>
					<div class="form-group"> <button type="submit" id="post" class="btn">commenter</button> </div>
				</form>
				<?php endif;?>
				<?php endif;?>
			</div>
		</div>

	</div>
</section>
<!-- Fin de form -->















<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<!-- <section id="avisJM"></section> -->