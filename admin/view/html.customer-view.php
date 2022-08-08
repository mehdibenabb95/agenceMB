<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="col-12 col-lg-12">
                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                    <div class="app-card-header p-3 border-bottom-0">
                        <div class="row align-items-center gx-3">
                            <div class="col-auto">
                                <div class="app-icon-holder card">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div class="col-auto">
                                <h4 class="app-card-title">Profil Client</h4>
                            </div>
                        </div>
                        <ul class="pagination">
                            <li class="page-item"><a href="/projet-agence/admin/client/list.php">Retour liste</a></li>
                            <?php
                            $previous = $clientManager->getPreviousCustomer($client);
                            $next = $clientManager->getNextCustomer($client);
                            //var_dump($previous);
                            //var_dump($next);
                            $previous_ref = $previous ? '<a accesskey="p" title="Raccourci clavier ALT + p" href="/agenceMB/admin/client/card.php?action=view&id=' . $previous . '"><li class="page-item active"><i class="fa fa-chevron-left"></i></li></a>' : '<li class="page-item inactive"><i class="fa fa-chevron-left"></i></li>';
                            $next_ref = $next ? '<a accesskey="n" title="Raccourci clavier ALT + n" href="/agenceMB/admin/client/card.php?action=view&id=' . $next . '"><li class="page-item active"><i class="fa fa-chevron-right"></i></li></a>' : '<li class="page-item inactive"><i class="fa fa-chevron-right"></i></li>';
                            echo $previous_ref;
                            echo $next_ref;
                            ?>
                        </ul>
                    </div>
                    <div class="app-card-body px-4 w-100">
                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-label"><strong>Nom</strong></div>
                                    <div class="item-data"><?php echo $client->getNom() . ' ' . $client->getPrenom(); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-label"><strong>Email</strong></div>
                                    <div class="item-data"><?php echo $client->getEmail(); ?></div>
                                </div>

                            </div>
                        </div>
                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-label"><strong>Numéro de téléphone</strong></div>
                                    <div class="item-data"><?php echo $client->getTelephone(); ?></div>

                                </div>
                            </div>
                        </div>
                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-label"><strong>Adresse</strong></div>
                                    <div class="item-data"><?php echo $client->getAdresse() . ', ' . $client->getCodePostal() . ' ' . $client->getVille(); ?></div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-label"><strong>Date création</strong></div>
                                    <div class="item-data"><?php echo  date('d-m-Y', strtotime($client->getDateCreation())); ?></div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="app-card-footer p-4 mt-auto">
                        <a class="btn app-btn-info" href="<?php echo $_SERVER['PHP_SELF'] . '?action=edit&id=' . $client->getIdCustomer(); ?>">Modifier le profil</a>
                        
                        <a class="btn app-btn-danger" href="action.customer-delete.php?id=<?php echo $client->getIdCustomer(); ?>" title="Supprimer" onclick="return confirm('Voulez vous supprimer cet utilistaeur?');">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>