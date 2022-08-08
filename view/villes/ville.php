<?php $title = 'ville'; ?>

<?php ob_start(); ?>
<div id="parallax-world-of-ugg">
 <?php foreach ($lesDescriptions as $uneDescription) : ?> 
<section>
  <div class="title">
    
    <h1><?=$uneDescription->getTitre() ?></h1>
  </div>
</section>

<section>
    <div  style="
  padding-top: 200px;
  padding-bottom: 200px;
  overflow: hidden;
  position: relative;
  width: 100%;
  background-image: url(admin/description_sejour/images/<?=$uneDescription->getImage()  ?>);
  background-attachment: fixed;
  background-size: cover;
  -moz-background-size: cover;
  -webkit-background-size: cover;
  background-repeat: no-repeat;
  background-position: top center;
">
      <h2><?=$uneDescription->getTitreImage() ?></h2>
    </div>
</section>

<section>
  <div class="block">
    <p><?=$uneDescription->getTexte() ?> </p>
    <p class="line-break margin-top-10"></p>
    
  </div>
  <?php endforeach;?>
</section>

  <div class=" reserver">
					<h1><i><a href = "./?path=main&action=sejour">Retour</a></i></h1>
</div>
</section>


 </div>



		
		<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>