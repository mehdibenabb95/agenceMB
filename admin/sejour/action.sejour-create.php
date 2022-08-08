<?php

if(isset($_POST["submit"])){
    $sejour = new Sejour($lePDO);
    // var_dump($_POST);
    // var_dump($_FILES);exit;
    
    $code=filter_var($_POST['code'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $villeDepart=filter_var($_POST['villeDepart'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $villeDestination=filter_var($_POST['villeDestination'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);    
    $dateDepart=filter_var($_POST['dateDepart'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $dateArrivee=filter_var($_POST['dateArrivee'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $placeTotal=filter_var($_POST['placeTotal'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $placeLibre=filter_var($_POST['placeLibre'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $prix=filter_var($_POST['prix'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description=filter_var($_POST['description'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sejour->setCode($code);
    $sejour->setVilleDepart($villeDepart);
    $sejour->setVilleDestination($villeDestination);
    $sejour->setDateDepart($dateDepart);
    $sejour->setDateArrivee($dateArrivee);
    $sejour->setPlaceTotal($placeTotal);
    $sejour->setPlaceLibre($placeLibre);
    $sejour->setPrix($prix);
    $sejour->setDescription($description);
    //var_dump($sejour);
    // upload file
    if(isset($_FILES['image'])){
        $error = 0;
        if (! is_dir("images")) mkdir("images");
        $tmpName = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        $size = $_FILES['image']['size'];
        $error = $_FILES['image']['error'];
        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));
        //Tableau des extensions que l'on accepte
        $allowed = ['jpg', 'png', 'jpeg', 'gif'];

        if(in_array($extension, $allowed)){
            move_uploaded_file($tmpName, './images/'.$name);
            $sejour->setImage($name);
        }
        else{
            $error++;
            $_SESSION['error']="Type de fichier non autorisé";
        }
    }
    if (!$error) {
        if ($sejourManager->addSejour($sejour)) {
            $_SESSION['success']="offre de séjour créé avec succès";
            $lastId = $lePDO->lastInsertId();
            header("location:card.php?action=view&id=$lastId");
            exit;
        } else {
            $_SESSION['error']="Une erreur est survenue lors de la création";
        }
    }
}

?>