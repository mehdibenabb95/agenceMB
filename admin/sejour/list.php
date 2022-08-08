<?php
session_start();
$title = "Liste des séjours";
include_once("../includes/header.php");
//controller
require('../model/bdd.php');
require('../model/managers/sejour.php');
//un objet qui represente la co a la BDD;
$lePDO=etablirCo();
//j'instancie un objet de la classe SejoureManager;
$sejourManager=new SejourManager($lePDO);
//j'apelle la méthode getAllSejourdepuis l'objet $sejourManager
//et je recupere le resultat dans la variable $sejours
$sejours=$sejourManager->getAllSejour();
// var_dump($sejours);
?>
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Liste des sejours</h1>
                </div>
            </div>
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">Code</th>
                                    <th class="cell">Ville de départ</th>
                                    <th class="cell">Ville de destination</th>
                                    <th class="cell">Date de départ</th>
                                    <th class="cell">Date Arrivé</th>
                                    <th class="cell">Prix</th>
                                    <th class="cell"></th>
                                    <th class="cell"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($sejours as $sejour){
                                        
                                        echo("<tr>");

                                            echo('<td class="cell"><strong>'.$sejour->getCode()."</strong></td>");
                                            echo('<td class="cell">'.$sejour->getVilleDepart()."</td>");
                                            echo('<td class="cell">'.$sejour->getVilleDestination()."</td>");
                                            echo('<td class="cell">'. date( 'd-m-Y', strtotime($sejour->getDateDepart())) ."</td>");
                                            echo('<td class="cell">'. date( 'd-m-Y', strtotime($sejour->getDateArrivee())) ."</td>");
                                            echo('<td class="cell">'.$sejour->getPrix()." €</td>");
                                            echo('<td class="cell">');
                                            echo('<a class="btn-sm app-btn-info" href="card.php?action=view&id=' . $sejour->getIdSejour() .'">Consulter</a>');
                                            echo("</td>");
                                            echo('<td class="cell">');
                                            echo('<a class="btn-sm app-btn-danger" href="action.sejour-delete.php?id='. $sejour->getIdSejour(). '" title="Supprimer" onclick="return confirm(\'Voulez vous supprimer ce séjour\');">Supprimer</a>');
                                            echo("</td>");
                                        echo("</tr>");
                                        
                                    }

                                ?>
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