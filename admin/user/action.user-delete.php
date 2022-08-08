<?php
    session_start();
    //controller
    require_once('../model/bdd.php');
    require_once('../model/managers/user.php');
    //un objet qui represente la co a la BDD;
    $lePDO = etablirCo();
    //j'instancie un objet de la classe StagiaireManager;
    $adminManager = new AdminManager($lePDO);
    
    $id=filter_var($_GET['id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //var_dump($sejour);
    //var_dump($sejourManager->addSejour($sejour));
    if (!$adminManager->getAdminByid($id)) {
        $_SESSION['error']="aucun admin avec cet identifiant";
        header("location:list.php");
    }
    else {
        if ($adminManager->deleteAdminById($id)) {
            $_SESSION['success']="L'admin est supprimé avec succès";
            header("location:list.php");
        } else {
            $_SESSION['error']="Une erreur est survenue lors de la suppression";
            header("location:list.php");

        }
    }

?>