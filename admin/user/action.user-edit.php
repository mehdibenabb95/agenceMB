<?php

if(isset($_POST["submit"])){
    //var_dump($_POST);
    $nom=filter_var($_POST['nom'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $prenom=filter_var($_POST['prenom'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);    
    $email=filter_var($_POST['email'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $admin->setNom($nom);
    $admin->setPrenom($prenom);
    $admin->setEmail($email);

    //var_dump($client);
    if($adminManager->updateadmin($admin)) {
        $id= $admin->getIdAdmin();
        $_SESSION['success']="Le compte client est mis-à-jour avec succès";
        header("location:card.php?action=view&id=$id");
        exit;
    } else {
        $_SESSION['error']="Une erreur est survenue lors des modifications";
    }
}

?>