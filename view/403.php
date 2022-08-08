<?php 
    $title = '403'; 
    ob_start(); 
 ?>
  	
<div class="container-fluid">
    <div class="erreur404 text-center">
    <h1>ERREUR</h1>
    <h1>403</h1>
    </div>
    


</div>

<?php 
    $content = ob_get_clean(); 
    require('template.php'); 
?>