<div class="row">
    <div class="col-md-12">
        <?= \systeme\Application\Application::block("menu_demmande") ?>
        <?php
        $role = \systeme\Model\Utilisateur::role();
        if (isset($fiche)) {
            $id_categorie = $fiche->getIdCategorie();
            $id_succursal = $fiche->getIdSuccursal();
            $id_agent = $fiche->getIdAgent();
            $agent = new \systeme\Model\Utilisateur();
            $agent = $agent->findById($id_agent);
            $cat = new \app\DefaultApp\Models\Categorie();
            $cat = $cat->findById($id_categorie);
            $succursal = new \app\DefaultApp\Models\Succursal();
            $succursal = $succursal->findById($id_succursal);

            $id_reparateur = $fiche->getIdReparateur();
            $reparateur = "n/a";
            if ($id_reparateur === "n/a") {
                $reparateur = "n/a";
            } else {
                $reparateur = $agent->findById($id_reparateur);
                $reparateur = $reparateur->getNom() . " " . $reparateur->getPrenom();
            }
        } else {
            return;
        }
        $montantTotal=$cat->getMontant();
        $pourcentage=$cat->getPourcentageAvance();
        $avance=($montantTotal*$pourcentage) / 100;
        $balance=$montantTotal-$avance;
        ?>
        <div class="card">
            <div class="card-header">
                <h4>Fiche Demmande</h4>
                <?php
                if ($role === "administrateur" || $role === "agent") {
                    if ($fiche->getPreuve() !== "n/a" and $fiche->getStatut() === "encours") {
                        ?>
                        <a href="?finaliser" class="float-right btn btn-warning">Finaliser Processus</a>
                        <?php
                    }
                }
                ?>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="form-group col-4">
                        <strong><label>Catégorie</label></strong><br>
                        <?php if (isset($cat)) echo stripslashes($cat->getCategorie()); ?>
                    </div>

                    <div class="form-group col-4">
                        <strong><label>Succursale</label></strong><br>
                        <?php if (isset($succursal)) echo stripslashes($succursal->getNom()) ?>
                    </div>

                    <div class="form-group col-4">
                        <strong><label>Agent</label></strong><br>
                        <?php if (isset($agent)) echo strtoupper($agent->getNom() . " " . $agent->getPrenom()) ?>
                    </div>

                    <div class="form-group col-4">
                        <strong><label>Localisation</label></strong><br>
                        <a target="_blank"
                           href="https://www.google.com/maps/dir//<?php if (isset($succursal)) echo $succursal->getLatitude() ?>,<?php if (isset($succursal)) echo $succursal->getLongitude() ?>"><?php if (isset($succursal)) echo $succursal->getLatitude() ?>
                            ,<?php if (isset($succursal)) echo $succursal->getLongitude() ?></a>
                    </div>

                    <div class="form-group col-4">
                        <strong><label>Reparateur</label></strong><br>
                        <?php echo $reparateur ?>
                    </div>

                    <div class="form-group col-4">
                        <strong><label>Statut</label></strong><br>
                        <?php echo $fiche->getStatut() ?>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="form-group col-4">
                        <strong><label>Description</label></strong><br>
                        <?php if (isset($fiche)) echo stripslashes($fiche->getDescription()) ?>
                    </div>
                    <div class="form-group col-8">
                        <div class="row">
                            <div class="col-4">
                                <label>Montant Total : </label><strong> <?= $montantTotal ?> GDS</strong><br>
                                <label>Pourcentage Avance : </label><strong> <?= $pourcentage ?> %</strong><br>
                                <label>Avance 1 : </label><strong> <?= $avance ?> GDS</strong><br>
                                <label>Balance : </label><strong> <?= $balance ?> GDS</strong>
                            </div>
                            <div class="col-4">
                                <label>Avance 1 </label><br>
                                <?php if ($fiche->getNote1() !== "n/a") {
                                    ?>
                                    <strong><a target="_blank" href="<?= $fiche->getNote1() ?>">Note PDF</a></strong>
                                    <?php
                                } else {
                                    if ($role === "agent" || $role === "administrateur") {
                                        if ($fiche->getStatut() === "encours") {
                                            ?>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#note1">
                                                Ajouter note
                                            </button>
                                            <div class="modal" id="note1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Note Avance 1</h4>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                &times;
                                                            </button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <div class="message"></div>
                                                            <form class="form_note" method="post">
                                                                <input type="hidden" name="id"
                                                                       value="<?= $fiche->getId() ?>">
                                                                <input type="hidden" name="type_note" value="note1">
                                                                <div class="form-group">
                                                                    <label>Note</label>
                                                                    <input accept="application/pdf" type="file"
                                                                           name="fichier"
                                                                           class="form-control"
                                                                           required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <input type="submit" value="Envoyer"
                                                                           class="btn btn-primary float-right">
                                                                </div>
                                                            </form>
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">Close
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </div>
                            <div class="col-4">
                                <label>Avance Final </label><br>
                                <?php if ($fiche->getNote2() !== "n/a") {
                                    ?>
                                    <strong><a target="_blank" href="<?= $fiche->getNote2() ?>">Note PDF</a></strong>
                                    <?php
                                } else {
                                    if ($role === "agent" || $role === "administrateur") {

                                        if ($fiche->getStatut() === "encours" and $fiche->getNote1() !== "n/a" and $fiche->getPreuve() !== "n/a") {
                                            ?>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#note2">
                                                Ajouter note
                                            </button>
                                            <div class="modal" id="note2">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Note Avance Final</h4>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                &times;
                                                            </button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <div class="message"></div>
                                                            <form class="form_note" method="post">
                                                                <input type="hidden" name="id"
                                                                       value="<?= $fiche->getId() ?>">
                                                                <input type="hidden" name="type_note" value="note2">
                                                                <div class="form-group">
                                                                    <label>Note</label>
                                                                    <input accept="application/pdf" type="file"
                                                                           name="fichier"
                                                                           class="form-control"
                                                                           required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <input type="submit" value="Envoyer"
                                                                           class="btn btn-primary float-right">
                                                                </div>
                                                            </form>
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">Close
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                } ?>

                            </div>
                        </div>
                    </div>


                    <div class="col-12"><hr></div>
                    <div class="form-group col-6">
                        <strong><label>Explication additionel</label></strong><br>
                        <?php
                        if (isset($fiche)) echo stripslashes($fiche->getExplicationAdditionel());
                        if ($role === "administrateur" and $fiche->getExplicationAdditionel()==="n/a" ) {
                            ?>
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                                    data-target="#explication">
                                Ajouter
                            </button>
                            <div class="clearfix"></div>
                            <div class="modal" id="explication">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Demmande Explication Additionel</h4>
                                            <button type="button" class="close" data-dismiss="modal">
                                                &times;
                                            </button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="message"></div>
                                            <form class="form_note" method="post">
                                                <input type="hidden" name="id"
                                                       value="<?= $fiche->getId() ?>">
                                                <input type="hidden" name="explication">

                                                <div class="form-group">
                                                    <label>Explication</label>
                                                    <textarea class="form-control" name="contenue"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <input type="submit" value="Envoyer"
                                                           class="btn btn-primary float-right">
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Close
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>

                    <div class="form-group col-6">
                        <strong><label>Réponse de l'explication</label></strong><br>
                        <?php if (isset($fiche)) echo stripslashes($fiche->getReponseExplication());

                        if ($role === "agent" and $fiche->getExplicationAdditionel()!=="n/a") {
                            if($fiche->getReponseExplication()==="n/a"){
                            ?>
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                                    data-target="#reponse">
                                Réponse
                            </button>

                            <div class="clearfix"></div>
                            <div class="modal" id="reponse">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Reponse Explication Additionel</h4>
                                            <button type="button" class="close" data-dismiss="modal">
                                                &times;
                                            </button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="message"></div>
                                            <form class="form_note" method="post">
                                                <input type="hidden" name="id"
                                                       value="<?= $fiche->getId() ?>">
                                                <input type="hidden" name="reponse_explication">

                                                <div class="form-group">
                                                    <label>Réponse</label>
                                                    <textarea class="form-control" name="contenue"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <input type="submit" value="Envoyer"
                                                           class="btn btn-primary float-right">
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Close
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                        }
                        ?>
                    </div>

                    <div class="col-12"><hr></div>

                    <div class="col-6">
                        <?php
                        if (isset($fiche)) {
                            $fichier = $fiche->getFichier();
                            $fichier = explode(",", $fichier);
                            ?>
                            <h5>Fichier</h5>
                            <div class="row">
                                <?php
                                foreach ($fichier as $f) {
                                    ?>
                                    <div class="col-6">
                                        <object
                                                data="<?= $f ?>"
                                                width="100%"
                                                height="300">
                                        </object>
                                        <a class="btn btn-primary float-right" href="<?= $f ?>">afficher</a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="col-6" style="border-left: 1px solid black">
                        <h5>Preuve de finalisation</h5>
                        <?php if ($role === "reparateur" and $fiche->getPreuve() === "n/a") {
                            if ($fiche->getNote1() !== "n/a") {
                                ?>
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                        data-target="#preuve">
                                    Ajouter Preuve
                                </button>
                                <div class="clearfix"></div>
                                <div class="modal" id="preuve">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Preuve de finalisation</h4>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    &times;
                                                </button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="message"></div>
                                                <form class="form_note" method="post">
                                                    <input type="hidden" name="id"
                                                           value="<?= $fiche->getId() ?>">

                                                    <input type="hidden" name="preuve">

                                                    <div class="form-group">
                                                        <label>Fichier</label>
                                                        <input type="file" name="fichier[]"
                                                               class="form-control"
                                                               required multiple>
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="submit" value="Envoyer"
                                                               class="btn btn-primary float-right">
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Close
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>

                        <?php
                        if (isset($fiche)) {
                            $preuve = $fiche->getPreuve();
                            if ($preuve !== "n/a") {
                                $preuve = explode(",", $preuve);
                                ?>
                                <div class="row">
                                    <?php
                                    foreach ($preuve as $f) {
                                        ?>
                                        <div class="col-6">
                                            <object
                                                    data="<?= $f ?>"
                                                    width="100%"
                                                    height="300">
                                            </object>
                                            <a class="btn btn-primary float-right" href="<?= $f ?>">afficher</a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>

                </div>


            </div>
        </div>


    </div>
</div>
