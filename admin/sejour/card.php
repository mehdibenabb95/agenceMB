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
    require_once('../model/managers/sejour.php');
    //un objet qui represente la co a la BDD;
    $lePDO = etablirCo();
    //j'instancie un objet de la classe StagiaireManager;
    $sejourManager = new SejourManager($lePDO);

    switch ($action) {
        case "view":
            //je recup dans l'url la valeur du parametre id
            $idSejour=filter_var($_GET['id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sejour=$sejourManager->getSejourById($idSejour);             
            $title = "gestion séjour";
            include_once("../includes/header.php");        
            require_once('../view/html.sejour-view.php');
            break;

        case "edit":
            $title = "modifier séjour";
            //je recup dans l'url la valeur du parametre id
            $idSejour=filter_var($_GET['id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sejour=$sejourManager->getSejourById($idSejour);         
            include_once('action.sejour-edit.php');  
            include_once("../includes/header.php");
            require_once('../view/html.sejour-form.php');
            break;

        case "create":
            $title = "création séjour";
            $sejour = new Sejour($lePDO);
            include_once('action.sejour-create.php');  
            include_once("../includes/header.php");       
            include_once('../view/html.sejour-form.php');
            break;
    }

    include_once("../includes/footer.php");
    ?>