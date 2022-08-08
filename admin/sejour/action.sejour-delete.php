<?php
    session_start();
    //controller
    require_once('../model/bdd.php');
    require_once('../model/managers/sejour.php');
    //un objet qui represente la co a la BDD;
    $lePDO = etablirCo();
    //j'instancie un objet de la classe StagiaireManager;
    $sejourManager = new SejourManager($lePDO);
    
    $id=filter_var($_GET['id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //var_dump($sejour);
    //var_dump($sejourManager->addSejour($sejour));
    if (!$sejourManager->getSejourByid($id)) {
        $_SESSION['error']="aucun séjour avec cet identifiant";
        header("location:list.php");
    }
    else {
        if ($sejourManager->deleteSejourById($id)) {
            $_SESSION['success']="Le sejour est supprimé avec succès";
            header("location:list.php");
        } else {
            $_SESSION['error']="Une erreur est survenue lors de la suppression";
            header("location:list.php");

        }
    }

?>