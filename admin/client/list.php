<?php
session_start();
$title = "Liste des clients";
include_once("../includes/header.php");
//controller
require('../model/bdd.php');
require('../model/managers/customer.php');
//un objet qui represente la co a la BDD;
$lePDO=etablirCo();
//j'instancie un objet de la classe CustomereManager;
$customerManager=new CustomerManager($lePDO);
//j'apelle la méthode getAllCustomer depuis l'objet $customerManager
//et je recupere le resultat dans la variable $clients
$clients=$customerManager-> getAllCustomer();
?>
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Liste des clients</h1>
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
                                    <th class="cell">Adresse</th>
                                    <th class="cell">Téléphone</th>
                                    <th class="cell"></th>
                                    <th class="cell"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($clients as $client){
                                        
                                        echo("<tr>");

                                            echo('<td class="cell">'.$client->getNom()."</td>");
                                            echo('<td class="cell">'.$client->getPrenom()."</td>");
                                            echo('<td class="cell">'.$client->getEmail()."</td>");
                                            echo('<td class="cell">'.$client->getAdresse() ."</td>");
                                            echo('<td class="cell">'.$client->getTelephone()."</td>");
                                            echo('<td class="cell">');
                                            echo('<a class="btn-sm app-btn-info" href="card.php?action=view&id=' . $client->getIdCustomer() .'">Consulter</a>');
                                            echo("</td>");
                                            echo('<td class="cell">');
                                            echo('<a class="btn-sm app-btn-danger" href="action.customer-delete.php?id='. $client->getIdCustomer(). '" title="Supprimer" onclick="return confirm(\'Voulez vous supprimer cet utilistaeur?\');">Supprimer</a>');
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