<?php
    session_start();
    //controller
    require_once('../model/bdd.php');
    require_once('../model/managers/customer.php');
    //un objet qui represente la co a la BDD;
    $lePDO = etablirCo();
    //j'instancie un objet de la classe StagiaireManager;
    $customerManager = new CustomerManager($lePDO);
    
    $id=filter_var($_GET['id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //var_dump($client);
    //var_dump($customerManager->addCustomer($client));
    if (!$customerManager->getCustomerByid($id)) {
        $_SESSION['error']="aucun utilistaeur avec cet identifiant";
        header("location:list.php");
    }
    else {
        if ($customerManager->deleteCustomerById($id)) {
            $_SESSION['success']="Le compte client est supprimé avec succès";
            header("location:list.php");
        } else {
            $_SESSION['error']="Une erreur est survenue lors de la suppression";
            header("location:list.php");

        }
    }

?>