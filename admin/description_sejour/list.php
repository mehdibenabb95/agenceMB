<?php
session_start();
$title = "Liste des séjours";
include_once("../includes/header.php");
//controller
require('../model/bdd.php');
require('../model/managers/descriptionsejour.php');
//un objet qui represente la co a la BDD;
$lePDO = etablirCo();
//j'instancie un objet de la classe SejoureManager;
$descriptionSejourManager = new DescriptionSejourManager($lePDO);
//j'apelle la méthode getAllSejourdepuis l'objet $sejourManager
//et je recupere le resultat dans la variable $sejours
$descriptionsejours = $descriptionSejourManager->getAllDescriptionSejour();

// var_dump($sejours);
?>
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Déscription des séjours</h1>
                </div>
            </div>
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>


                                <tr>
                                    <th class="cell">Titre</th>
                                    <th class="cell">Titre Image</th>
                                    <th class="cell">Déscription</th>
                                </tr>

                            </thead>
                            

                                <?php foreach ($descriptionsejours as $descriptionsejour) : ?>
                                    
                                    <tbody>
                                    <tr>

                                        <td class="cell"><strong><?= $descriptionsejour->getTitre() ?></strong></td>
                                        <td class="cell"><?= $descriptionsejour->getTitreImage() ?></td>
                                        <td class="cell"><?= $descriptionsejour->getTexte() ?></td>
                                   
                                    <td class="cell">
                                        <a class="btn-sm app-btn-info" href="card.php?action=view&id= <?= $descriptionsejour->getIdDescription() ?>">Consulter</a>
                                    </td>
                                    <td class="cell">
                                        <a class="btn-sm app-btn-danger" href="action.descriptionsejour-delete.php?id=<?= $descriptionsejour->getIdDescription() ?>" onclick=" return confirm('voulez vous supprimer ce séjour?')">Supprimer</a>
                                    </td>
                                    </tr>
                                  

                            </tbody>
                            <?php endforeach; ?>


                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <?php
    include_once("../includes/footer.php");
    ?>