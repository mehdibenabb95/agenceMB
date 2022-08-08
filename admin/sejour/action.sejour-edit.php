<?php

if(isset($_POST["submit"])){
    //var_dump($_POST);
    //var_dump($_FILES);
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
    $error = 0;
    if(isset($_FILES['image']) && !empty($_FILES["image"]["name"])){
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
            if ($sejour->getImage()) unlink("/images".$sejour->getImage());
            move_uploaded_file($tmpName, './images/'.$name);
            $sejour->setImage($name);
        }
        else{
            $error++;
            $_SESSION['error']="Type de fichier non autorisé";
        }
    }
    if (!$error) {
        if ($sejourManager->updateSejour($sejour)) {
            $_SESSION['success']="offre de séjour modifié avec succès";
            $id = $sejour->getIdSejour();
            header("location:card.php?action=view&id=$id");
            exit;
        } else {
            $_SESSION['error']="Une erreur est survenue lors des modifications";
        }
    }
}

?>