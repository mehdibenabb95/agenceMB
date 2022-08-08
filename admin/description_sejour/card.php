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
    require_once('../model/managers/descriptionsejour.php');
    require_once('../model/managers/sejour.php');
    

    //un objet qui represente la co a la BDD;
    $lePDO = etablirCo();
    //j'instancie un objet de la classe StagiaireManager;
    $DescriptionSejourManager = new DescriptionSejourManager($lePDO);

    switch ($action) {
        case "view":
            //je recup dans l'url la valeur du parametre id
            $idDescription=filter_var($_GET['id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $descriptionsejour= $DescriptionSejourManager->getDescriptionSejourByIdDescription($idDescription);
            // var_dump($descriptionsejour);
            
            // var_dump($descriptionsejour);         
            $title = "gestion descriptionséjour";
            include_once("../includes/header.php");        
            require_once('../view/descriptionsejour-view.php');
            break;

        case "edit":
            $title = "modifier descriptionséjour";
            //je recup dans l'url la valeur du parametre id
            $idDescription=filter_var($_GET['id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $descriptionSejour= $DescriptionSejourManager->getDescriptionSejourByIdDescription($idDescription); 
            $objetSejourManager = new SejourManager($lePDO);
            $lesSejours = $objetSejourManager->getAllSejour();        
            include_once('action.descriptionsejour-edit.php');  
            include_once("../includes/header.php");
            require_once('../view/descriptionsejour-form.php');
            break;

        case "create":
            $title = "création descriptionséjour";
            $descriptionSejour = new Descriptionsejour();
            $descriptionsejourManager  = new DescriptionSejourManager($lePDO);
            
            $objetSejourManager = new SejourManager($lePDO);
            $lesSejours = $objetSejourManager->getAllSejour();
            include_once('action.descriptionsejour-create.php');  
            include_once("../includes/header.php");       
            include_once('../view/descriptionsejour-form.php');
            break;
    }

    include_once("../includes/footer.php");
    ?>