<?php
if(isset($_POST["submit"])){
    
    // var_dump($_POST);exit;
    
    $nom=filter_var($_POST['nom'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $prenom=filter_var($_POST['prenom'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);    
    $email=filter_var($_POST['email'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    $mdp=filter_var($_POST['mdp'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mdp=hash('sha256',$mdp);
   
    
    $admin->setNom($nom);
    $admin->setPrenom($prenom);
    $admin->setEmail($email);
    
    $admin->setMdp($mdp);
//    var_dump($admin);

    
    if ($adminManager->getAdminByEmail($email)) {
        $_SESSION['error']="Adresse Email existe déjà";
    }
    
    else {
        
        if ($adminManager->addAdmin($admin)){
        
            $_SESSION['success']="Le compte client est créé avec succès";
            $lastId = $lePDO->lastInsertId();
            header("location:card.php?action=view&id=$lastId");
            exit;
    } 
         
        else {
            $_SESSION['error']="Une erreur est survenue lors de la création";
        }
    
    }
    

}

?>