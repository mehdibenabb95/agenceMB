<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="col-12 col-lg-12">
                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                    <div class="app-card-header p-3 border-bottom-0">
                        <div class="row align-items-center gx-3">
                            <div class="col-auto">
                                <div class="app-icon-holder card">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-columns-gap" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M6 1H1v3h5V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12h-5v3h5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8H1v7h5V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6h-5v7h5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div class="col-auto">
                                <h4 class="app-card-title"><strong></strong></h4>
                            </div>
                        </div>
                        <?php if ($descriptionsejour->getImage()) : ?>
                            <div class="col-auto">
                                <img class="descriptionsejour-image w-50" src="images/<?=$descriptionsejour->getImage() ?>" alt="image">
                            </div>
                        <?php endif ?>
                        <ul class="pagination">
                            <li class="page-item"><a href="/agenceMB/admin/description_sejour/list.php">Retour liste</a></li>
                            <?php
                            $previous = $DescriptionSejourManager->getPreviousDescriptionSejour($descriptionsejour);
                            $next = $DescriptionSejourManager->getNextDescriptionSejour($descriptionsejour);
                            //var_dump($previous);
                            //var_dump($next);
                            $previous_ref = $previous ? '<a accesskey="p" title="Raccourci clavier ALT + p" href="/agenceMB/admin/description_sejour/card.php?action=view&id=' . $previous . '"><li class="page-item active"><i class="fa fa-chevron-left"></i></li></a>' : '<li class="page-item inactive"><i class="fa fa-chevron-left"></i></li>';
                            $next_ref = $next ? '<a accesskey="n" title="Raccourci clavier ALT + n" href="/agenceMB/admin/description_sejour/card.php?action=view&id=' . $next . '"><li class="page-item active"><i class="fa fa-chevron-right"></i></li></a>' : '<li class="page-item inactive"><i class="fa fa-chevron-right"></i></li>';
                            echo $previous_ref;
                            echo $next_ref;
                            ?>
                        </ul>
                        
                            
                       
                       
                    </div>
                    <div class="app-card-body px-4 w-100">
                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-label"><strong>Titre</strong></div>
                                    <div class="item-data"><?= $descriptionsejour->getTitre() ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="item border-bottom py-3">
                            <div class="row justify-content-satrt align-items-center">
                                <div class="col-6">
                                    <div class="item-label"><strong>Titre Image</strong></div>
                                    <div class="item-data"><?= $descriptionsejour->getTitreImage() ?></div>
                                </div>
                                <div class="col-6">
                                    <div class="item-label"><strong>Description</strong></div>
                                    <div class="item-data"><?= $descriptionsejour->getTexte() ?></div>
                                </div>

                            </div>
                        </div>
                      
                    </div>
                    <div class="app-card-footer p-4 mt-auto">
                        <a class="btn app-btn-info" href="<?= $_SERVER['PHP_SELF'] . '?action=edit&id=' . $descriptionsejour->getIdDescription() ?>">Modifier le séjour</a>
                        <a class="btn app-btn-danger" href="action.descriptionsejour-delete.php?id=<?=$descriptionsejour->getIdDescription()  ?>" title="Supprimer" onclick="">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>