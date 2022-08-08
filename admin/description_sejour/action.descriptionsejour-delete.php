<?php
    session_start();
    //controller
    require_once('../model/bdd.php');
    require_once('../model/managers/descriptionsejour.php');
    //un objet qui represente la co a la BDD;
    $lePDO = etablirCo();
    //j'instancie un objet de la classe descriptionsejourManager;
    $descriptionSejourManager = new DescriptionSejourManager($lePDO);
    
    $id=filter_var($_GET['id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  
    if (! $descriptionSejourManager ->getDescriptionSejourByIdDescription($id)) {
        
        $_SESSION['error']="aucun séjour avec cet identifiant";
        header("location:list.php");
    }
    else {

        if ($descriptionSejourManager ->deleteDescriptionById($id)) {
            $_SESSION['error']="Le sejour est supprimé avec succès";
            header("location:list.php");
        } else {
            $_SESSION['error']="Une erreur est survenue lors de la suppression";
            header("location:list.php");

        }
    }

?>