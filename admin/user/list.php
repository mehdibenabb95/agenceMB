<?php
session_start();
$title = "Liste des admins";
include_once("../includes/header.php");
//controller
require('../model/bdd.php');
require('../model/managers/user.php');
//un objet qui represente la co a la BDD;
$lePDO = etablirCo();
//j'instancie un objet de la classe SejoureManager;
$adminManager = new AdminManager($lePDO);
//j'apelle la méthode getAllSejourdepuis l'objet $sejourManager
//et je recupere le resultat dans la variable $sejours
$admins = $adminManager->getAllAdmin();
// var_dump($sejours);
?>
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Liste des admins</h1>
                </div>
            </div>
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">Nom</th>
                                    <th class="cell">Prénom</th>
                                    <th class="cell">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($admins as $admin) : ?>
                                <tr>

                                        <td class="cell"><?= $admin->getNom() ?></td>
                                        <td class="cell"><?= $admin->getPrenom() ?></td>
                                        <td class="cell"><?= $admin->getEmail() ?></td>
                                    
                                    <td class="cell">
                                        <a class="btn-sm app-btn-info" href="card.php?action=view&id=<?= $admin->getIdAdmin()?>">Consulter</a>
                                    </td>
                                    <td class="cell">
                                        <a class="btn-sm app-btn-danger" href="action.user-delete.php?id=<?= $admin->getIdAdmin()?>">Suprimer</a>
                                    </td>
                                    </tr>
                                    <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <?php
    include_once("../includes/footer.php");
    ?>