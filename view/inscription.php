<?php $title = 'inscription'; ?>
<!-- qui récupere mon titre  -->
<?php ob_start();
// démare

?>

<div class="container">
   <?php if (isset($_SESSION["error"]) && $_SESSION["error"]) : ?>
      <div class="alert alert-warning"><?php echo $_SESSION["error"]; ?></div>
      <?php unset($_SESSION["error"]); ?>
   <?php endif; ?>
   <?php if (isset($_SESSION["success"]) && $_SESSION["success"]) : ?>
      <div class="alert alert-info"><?php echo $_SESSION["success"]; ?></div>
      <?php unset($_SESSION["success"]); ?>
   <?php endif; ?>

   <div class="form-all">
      <h1>Formulaire d'inscription</h1>
      <form class="form-inscription bg bg-warning" action="./?path=main&action=inscription-traitement" method='POST'>
         <div class="container">
            <div class=" form-group col-6 mb-1 p-2 ">
               <label class="radio-inline">Mr</label>
               <input type="radio" name="gendre" value="male" required>
               <label class="radio-inline">Mme</label>
               <input type="radio" name="gendre" value="female" required>
            </div>
            <div class="row p-2 ">
               <div class="col-md-6 ">
                  <input class="form-control border border-4 border-warning" type="text" name="nom" placeholder="nom"  required />
               </div>
               <div class="col-md-6">
                  <input class="form-control border border-4 border-warning" type="text" name="prenom" placeholder="prenom" required />
               </div>
            </div>
            <div class="row p-2">
               <div class="col-md-6">
                  <input class="form-control border border-4 border-warning" type="email" name="email" placeholder="email" required />
               </div>
               <div class="col-md-6">
                  <input class="form-control border border-4 border-warning" type="text" name="telephone" placeholder="telephone" required />

               </div>
            </div>

            <div class="row p-2">
               <div class="col-md-6">
                  <input class="form-control border border-4 border-warning" type="password" name="mdp" placeholder="mot de passe" minlength="6" required />
               </div>
               <div class="col-md-6">
                  <input class="form-control border border-4 border-warning" type="password" name="mdpconf" placeholder="confirmation mot de passe" minlength="6" required />
               </div>
            </div>

            <div class="row p-2">
               <div class="col-md-6">
                  <input class="form-control border border-4 border-warning" type="text" name="adresse" placeholder="adresse" required />
               </div>
               <div class="col-md-3">
                  <input class="form-control border border-4 border-warning" type="text" name="ville" placeholder="ville" required />
               </div>
               <div class="col-md-3">
                  <input class="form-control border border-4 border-warning" type="text" name="codePostal" placeholder="code postal" required />

               </div>
            </div>

            <div class="row">
               <div class="col-2 mx-auto p-2">
                  <button class="form-control btn btn-success" name='submit'>valider </button>
               </div>
            </div>
   </div>
      </form>
   </div>

</div>
</div>












<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>