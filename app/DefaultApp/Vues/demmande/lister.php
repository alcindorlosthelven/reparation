<div class="row">
    <div class="col-md-12">
        <?= \systeme\Application\Application::block("menu_demmande") ?>
        <div class="card">
            <div class="card-header"><h4>Liste des demmandes</h4></div>
            <div class="card-body">
                <form method="post">
                    <div class="row">
                        <div class="form-group col-3">
                            <label>De</label>
                            <input value="<?php if (isset($_POST['de'])){echo $_POST['de'];}else{echo date("Y-m-d");} ?>" type="text" name="de"
                                   class="datePicker form-control" required>
                        </div>

                        <div class="form-group col-3">
                            <label>A</label>
                            <input value="<?php if (isset($_POST['a'])){echo $_POST['a'];}else{echo date("Y-m-d");} ?>" type="text" name="a"
                                   class="datePicker form-control" required>
                        </div>

                        <div class="form-group col-3">
                            <label>Statut</label>
                            <select class="form-control" name="statut">
                                <option value="en attent">En attent</option>
                                <option value="attribuer a réparateur">Attribuer a réparateur</option>
                                <option value="refuser par réparateur">Refuser par réparateur</option>
                                <option value="encours">encours</option>
                                <option value="terminer">Terminer</option>
                            </select>
                        </div>

                        <div class="form-group col-3">
                            <label>.</label><br>
                            <input type="submit" value="Valider" class="btn btn-primary">
                        </div>
                    </div>
                </form>
                <table class="table table-bordered  datatable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Catégorie</th>
                        <th>Succursale</th>
                        <th>Agent</th>
                        <th>Date</th>
                        <th>Statut</th>
                        <th>Réparateur</th>
                        <th>Localisation</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $role = \systeme\Model\Utilisateur::role();
                    $cat = new \app\DefaultApp\Models\Categorie();
                    $succursal = new \app\DefaultApp\Models\Succursal();
                    $agent = new \systeme\Model\Utilisateur();
                    if (isset($listeDemmande)) {
                        foreach ($listeDemmande as $suc) {
                            $id_succursal = $suc->getIdSuccursal();
                            $id_categorie = $suc->getIdCategorie();
                            $cat = $cat->findById($id_categorie);
                            $succursal = $succursal->findById($id_succursal);
                            $id_agent = $suc->getIdAgent();
                            $agent = $agent->findById($id_agent);
                            $id_reparateur = $suc->getIdReparateur();
                            $reparateur = "n/a";
                            if ($id_reparateur === "n/a") {
                                $reparateur = "n/a";
                            } else {
                                $reparateur = $agent->findById($id_reparateur);
                                $reparateur = $reparateur->getNom() . " " . $reparateur->getPrenom();
                            }
                            ?>
                            <tr>
                                <td><?= $suc->getId(); ?></td>
                                <td><?= stripslashes($cat->getCategorie()) ?></td>
                                <td><?= stripslashes($succursal->getNom()) ?></td>
                                <td><?= ucfirst($agent->getNom() . " " . $agent->getPrenom()) ?></td>
                                <td><?= stripslashes($suc->getDate()) ?></td>
                                <td><?= stripslashes($suc->getStatut()) ?></td>
                                <td>
                                    <?= ucfirst($reparateur) ?>
                                    <?php

                                    if ($role === "administrateur") {
                                        if ($reparateur === "n/a") {
                                            ?>
                                            <br>
                                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                                                    data-target="#mod<?= $suc->getId() ?>">
                                                Attribuer
                                            </button>
                                            <?php
                                        } else {
                                            if ($suc->getStatut() !== "encours") {
                                                if ($suc->getStatut() !== "terminer") {
                                                    ?>
                                                    <br>
                                                    <button type="button" class="btn btn-primary btn-xs"
                                                            data-toggle="modal"
                                                            data-target="#mod<?= $suc->getId() ?>">
                                                        Modifier
                                                    </button>
                                                    <?php
                                                }
                                            }
                                        }
                                    }

                                    if ($role === "reparateur") {
                                        if ($suc->getStatut() !== "encours") {
                                            if ($suc->getStatut() !== "terminer") {
                                                ?>
                                                <br>
                                                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                                                        data-target="#mod1<?= $suc->getId() ?>">
                                                    Confirmation
                                                </button>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a target="_blank"
                                       href="https://www.google.com/maps/dir//<?= $succursal->getLatitude() ?>,<?= $succursal->getLongitude() ?>"><?= $succursal->getLatitude() ?>
                                        ,<?= $succursal->getLongitude() ?></a>
                                </td>

                                <td><a href="fiche-demmande-<?= $suc->getId() ?>">Afficher</a></td>

                                <td>
                                    <?php
                                    if ($suc->getStatut() == "en attent" and $role === "agent") {
                                        ?>
                                        <a class="delete" href="supprimer-demmande-<?= $suc->getId() ?>"><i
                                                    style="color:red" class="fa fa-trash"></i></a>

                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>

                            <div class="modal" id="mod<?= $suc->getId() ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Attribuer</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="message"></div>
                                            <form class="form-attribuer">
                                                <input type="hidden" name="attribuer">
                                                <input type="hidden" name="id" value="<?= $suc->getId(); ?>">
                                                <div class="form-group">
                                                    <label>Réparateur</label>
                                                    <select class="form-control" name="id_reparateur" required>
                                                        <?php
                                                        if (isset($listeReparateur)) {
                                                            foreach ($listeReparateur as $rep) {
                                                                ?>
                                                                <option value="<?= $rep->getId() ?>"><?= $rep->getNom() . " " . $rep->getPrenom() ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <input type="submit" value="Attribuer"
                                                           class="btn btn-primary float-right">
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="modal" id="mod1<?= $suc->getId() ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Confirmer Attribution</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="message"></div>
                                            <form class="form-attribuer">
                                                <input type="hidden" name="confirmer_attribution">
                                                <input type="hidden" name="id" value="<?= $suc->getId(); ?>">
                                                <div class="form-group">
                                                    <label>Confirmation</label>
                                                    <select class="form-control" name="reponse" required>
                                                        <option value="oui">OUI</option>
                                                        <option value="non">NON</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <input type="submit" value="Valider"
                                                           class="btn btn-primary float-right">
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>