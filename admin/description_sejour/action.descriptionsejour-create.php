<?php

if (isset($_POST["submit"])) {

   
    $titre = filter_var($_POST['titre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $titreImage = filter_var($_POST['titreImage'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $texte = filter_var($_POST['texte'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $numOrdre = filter_var($_POST['numOrdre'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $idSejour = filter_var($_POST['idSejour'], FILTER_SANITIZE_FULL_SPECIAL_CHARS).
    
    // var_dump($descriptionSejour);
    $descriptionSejour->setTitre($titre);
    $descriptionSejour->setTitreImage($titreImage);
    $descriptionSejour->setTexte($texte);
    $descriptionSejour->setnumOrdre($numOrdre);
    $descriptionSejour->setidSejour($idSejour);


    if (isset($_FILES['image'])) {
        $error = 0;
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

    if (!$error) {
        if ($descriptionsejourManager->addDescriptionSejour($descriptionSejour)) {
            // var_dump(($DescriptionSejourManager->addDescriptionSejour($descriptionsejour)));
            $_SESSION['success'] = "offre de séjour créé avec succès";
            $lastId = $lePDO->lastInsertId();
            header("location:card.php?action=view&id=$lastId");
            exit;
        } else {
            $_SESSION['error'] = "Une erreur est survenue lors de la création";
        }
    }
}
