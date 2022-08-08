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
    require_once('../model/managers/user.php');
    //un objet qui represente la co a la BDD;
    $lePDO = etablirCo();
    //j'instancie un objet de la classe AdminManager;
    $adminManager = new AdminManager($lePDO);

    switch ($action) {
        case "view":
            //je recup dans l'url la valeur du parametre id
            $idAdmin=filter_var($_GET['id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $admin=$adminManager->getAdminById($idAdmin);            
            $title = "gestion admin";
            include_once("../includes/header.php");        
            require_once('../view/user-view.php');
            break;

        case "edit":
            $title = "modifier admin";
            //je recup dans l'url la valeur du parametre id
            $idAdmin=filter_var($_GET['id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $admin=$adminManager->getAdminById($idAdmin);           
            include_once('action.user-edit.php');  
            include_once("../includes/header.php");
            require_once('../view/user-form.php');
            break;

        case "create":
            $title = "création admin";
            $admin = new Admin($lePDO);
            include_once('action.user-create.php');  
            include_once("../includes/header.php");       
            include_once('../view/user-form.php');
            break;
    }

    include_once("../includes/footer.php");
    ?>