<?php 
    if (! isset($_SESSION["id"]) || $_SESSION['role'] != 'admin')
        header("location:/agenceMB/index.php?path=main&action=login");
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <title><?php echo $title ?></title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Mon agence">
    <meta name="author" content="Benabbou Mehdi">   
    <link rel="stylesheet" href="admin/assets/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
 
    <link rel="shortcut icon" href="http://localhost/agenceMB/admin/assets/images/app-logo.svg"> 

	<!-- Bootstrap 5-->
	<link id="theme-style" rel="stylesheet" href="http://localhost/agenceMB/admin/assets/bootstrap/css/bootstrap.min.css">
    
    <!-- FontAwesome JS-->
    <script defer src="http://localhost/agenceMB/admin/assets/fonts/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="http://localhost/agenceMB/admin/assets/css/style.css">

</head> 
<body class="app">
<?php
  //var_dump($_SESSION);
	if(isset($_SESSION['error'])){ ?>

		<div class="toast show align-items-center text-white bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
		  <div class="d-flex">
		    <div class="toast-body">
			<?php echo $_SESSION["error"]; ?>
		    </div>
		    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
		  </div>
		</div>
	
	<?php
		unset($_SESSION['error']); }
        if(isset($_SESSION['success'])){ ?>

            <div class="toast show align-items-center text-white bg-success" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="d-flex">
                <div class="toast-body">
                <?php echo $_SESSION["success"]; ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
            </div>
        
        <?php
          unset($_SESSION['success']); }
        ?>
<header class="app-header fixed-top">
<?php

include_once("topbar.php");
include_once("sidebar.php");
?>

</header>