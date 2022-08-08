<?php $title = 'editform-inscription'; ?>

<?php ob_start(); ?>
<div class="container">
<?php if (isset($_SESSION["error"]) && $_SESSION["error"]) : ?>
	<div class="alert alert-warning"><?php echo $_SESSION["error"]; ?></div>
	<?php unset($_SESSION["error"]); ?>
<?php endif; ?>

   <div class="form">
      <div class=" form-all p-4  ">
         <h1>Formulaire d'inscription</h1>
         <form class="form-inscription bg bg-warning" action="./?path=customer&action=edit-profilcustomer" method='POST'>
            <div class="container mr-1">
               <div class=" form-group col-6 mb-1 p-2 ">
                  <label class="radio-inline">Mr</label>
                  <input type="radio" name="gendre" value="<?= $customers->getGendre() ?>" required>
                  <label class="radio-inline">Mme</label>
                  <input type="radio" name="gendre" value="<?= $customers->getGendre() ?>" required>
               </div>
               <div class="row p-2 ">
                  <div class="col-md-6 ">
                     <input class="form-control border border-4 border-warning" value="<?= $customers->getNom() ?>" type="text" name="nom" placeholder="nom" required />
                  </div>
                  <div class="col-md-6">
                     <input class="form-control border border-4 border-warning" value="<?= $customers->getPrenom() ?>" type="text" name="prenom" placeholder="prenom" required />
                  </div>
               </div>
               <div class="row p-2">
                  <div class="col-md-6">
                     <input class="form-control border border-4 border-warning" value="<?= $customers->getEmail() ?>" type="email" name="email" placeholder="email" required />
                  </div>
                  <div class="col-md-6">
                     <input class="form-control border border-4 border-warning" value="<?= $customers->getTelephone() ?>" type="text" name="telephone" placeholder="telephone" required />

                  </div>
               </div>


            
               <div class="row p-2">
                  <div class="col-md-6">
                     <input class="form-control border border-4 border-warning" value="<?= $customers->getAdresse() ?>" type="text" name="adresse" placeholder="adresse" required />
                  </div>
                  <div class="col-md-3">
                     <input class="form-control border border-4 border-warning" value="<?= $customers->getVille() ?>" type="text" name="ville" placeholder="ville" required />
                  </div>
                  <div class="col-md-3">
                     <input class="form-control border border-4 border-warning" value="<?= $customers->getCodePostal() ?>" type="text" name="codePostal" placeholder="code postal" required />

                  </div>
               </div>
            
            <div class="row">
               <div class="col-2 mx-auto p-2">
                  <button class="form-control btn btn-success" name='update'>valider </button>
               </div>
            </div>

         </form>
      </div>






   </div>

</div>
</div>













<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>