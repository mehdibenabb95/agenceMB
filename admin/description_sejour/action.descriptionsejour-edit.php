<?php

if (isset($_POST["submit"])) {

    // var_dump($_POST);
    // var_dump($_FILES);
    $titre = filter_var($_POST['titre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $titreImage = filter_var($_POST['titreImage'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $texte = filter_var($_POST['texte'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $numOrdre = filter_var($_POST['numOrdre'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $idSejour = filter_var($_POST['idSejour'], FILTER_SANITIZE_FULL_SPECIAL_CHARS).
    
    // var_dump($descriptionSejour->getTitre())
    $descriptionSejour->setTitre($titre);
    $descriptionSejour->setTitreImage($titreImage);
    $descriptionSejour->setTexte($texte);
    $descriptionSejour->setnumOrdre($numOrdre);
    $descriptionSejour->setidSejour($idSejour);
    // var_dump($_FILES);exit;
    $error = 0;
    if (!empty($_FILES['image']['name'])) {
        
        if (!is_dir("images")) mkdir("images");
        $tmpName = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        $size = $_FILES['image']['size'];
        $error = $_FILES['image']['error'];
        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));
        //Tableau des extensions que l'on accepte
        $allowed = ['jpg', 'png', 'jpeg', 'gif'];

        if (in_array($extension, $allowed)) {
            move_uploaded_file($tmpName, './images/' . $name);
            $descriptionSejour->setImage($name);
        } else {
            $error++;
            $_SESSION['error'] = "Type de fichier non autorisé";
        }
    }

    //  var_dump($descriptionSejour);
    // var_dump($_FILES);
    // exit;
    if (!$error) {
        if ($DescriptionSejourManager->updateDescrpiptionSejour($descriptionSejour)) {
            
            $_SESSION['success'] = "offre de séjour créé avec succès";
            $id = $descriptionSejour->getIdDescription();
            header("location:card.php?action=view&id=$id");
            exit;
        } else {
            $_SESSION['error'] = "Une erreur est survenue lors de la création";
        }
    }
}
