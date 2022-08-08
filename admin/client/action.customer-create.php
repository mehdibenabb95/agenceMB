<?php

if(isset($_POST["submit"])){
    $client = new Customer($lePDO);
    //var_dump($client);
    $gendre=filter_var($_POST['gender'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $nom=filter_var($_POST['nom'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $prenom=filter_var($_POST['prenom'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);    
    $email=filter_var($_POST['email'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $phone=filter_var($_POST['phone'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mdp=filter_var($_POST['mdp'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mdp=hash('sha256',$mdp);
    $adresse=filter_var($_POST['adresse'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $ville=filter_var($_POST['ville'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $codePostal=filter_var($_POST['codePostal'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $client->setGendre($gendre);
    $client->setNom($nom);
    $client->setPrenom($prenom);
    $client->setEmail($email);
    $client->setTelephone($phone);
    $client->setMdp($mdp);
    $client->setAdresse($adresse);
    $client->setVille($ville);
    $client->setCodePostal($codePostal);
    //var_dump($client);
    //var_dump($clientManager->addCustomer($client));
    if ($clientManager->getCustomerByEmail($email)) {
        $_SESSION['error']="Adresse Email existe déjà";
    }
    else {
        if ($clientManager->addCustomer($client)) {
            $_SESSION['success']="Le compte client est créé avec succès";
            $lastId = $lePDO->lastInsertId();
            header("location:card.php?action=view&id=$lastId");
            exit;
        } else {
            $_SESSION['error']="Une erreur est survenue lors de la création";
        }
    }
}

?>