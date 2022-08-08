<?php $title = 'welcome'; 
ini_set('display_errors', 'on');
?>



<?php ob_start(); ?>

<?php if(isset($_SESSION['nom']) && ($_SESSION['prenom'])) : ?> 
<p class="welcome"> Bonjour <?= $_SESSION['nom'] . ' ' . $_SESSION['prenom']  ?></p>
<?php endif; ?>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>