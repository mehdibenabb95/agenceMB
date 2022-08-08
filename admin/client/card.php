<?php
    session_start();

    if(!isset($_GET['action']))
    {
        $action="";
    }
    else{
        $action=filter_var($_GET['action'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    //controller
    require_once('../model/bdd.php');
    require_once('../model/managers/customer.php');
    //un objet qui represente la co a la BDD;
    $lePDO = etablirCo();
    //j'instancie un objet de la classe CustomerManager;
    $clientManager = new CustomerManager($lePDO);

    switch ($action) {
        case "view":
            $title = "gestion client";
            include_once("../includes/header.php");
            //je recup dans l'url la valeur du parametre num
            $idCustomer=filter_var($_GET['id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $client=$clientManager->getCustomerById($idCustomer);         
            require_once('../view/html.customer-view.php');
            break;

        case "edit":
            $title = "modifier client";
            $idCustomer=filter_var($_GET['id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $client=$clientManager->getCustomerById($idCustomer);         
            include_once('action.customer-edit.php');  
            include_once("../includes/header.php");
            //je recup dans l'url la valeur du parametre num
            require_once('../view/html.customer-form.php');
            break;
        case "create":
            $title = "création client";
            $client = new Customer($lePDO);
            include_once('action.customer-create.php');  
            include_once("../includes/header.php");       
            include_once('../view/html.customer-form.php');
            break;
    }

    include_once("../includes/footer.php");
    ?>