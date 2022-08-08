<?php

if(isset($_POST["submit"])){
    //var_dump($_POST);
    $nom=filter_var($_POST['nom'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $prenom=filter_var($_POST['prenom'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);    
    $email=filter_var($_POST['email'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $phone=filter_var($_POST['phone'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $adresse=filter_var($_POST['adresse'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $ville=filter_var($_POST['ville'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $codePostal=filter_var($_POST['codePostal'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $client->setNom($nom);
    $client->setPrenom($prenom);
    $client->setEmail($email);
    $client->setTelephone($phone);
    $client->setAdresse($adresse);
    $client->setVille($ville);
    $client->setCodePostal($codePostal);
    //var_dump($client);
    if($clientManager->updateCustomer($client)) {
        $id= $client->getIdCustomer();
        $_SESSION['success']="Le compte client est mis-à-jour avec succès";
        header("location:card.php?action=view&id=$id");
        exit;
    } else {
        $_SESSION['error']="Une erreur est survenue lors des modifications";
    }
}

?>