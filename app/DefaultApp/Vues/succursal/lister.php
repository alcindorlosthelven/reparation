<div class="row">
    <div class="col-md-12">
        <?= \systeme\Application\Application::block("menu_succursal") ?>
        <div class="card">
            <div class="card-header"><h4>Liste des Succursales</h4></div>

            <div class="card-body">
                <form method="post">
                    <div class="row">

                        <div class="form-group col-8">
                            <label>Agent</label>
                            <select class="form-control" name="id_agent">
                                <?php
                                if(isset($agent)){
                                    ?>
                                    <option value="<?= $agent->getId() ?>"><?= strtoupper($agent->getNom() . " " . $agent->getPrenom()) ?></option>
                                    <?php
                                }
                                if (isset($listeAgent)) {
                                    foreach ($listeAgent as $agent) {
                                        ?>
                                        <option value="<?= $agent->getId() ?>"><?= strtoupper($agent->getNom() . " " . $agent->getPrenom()) ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-4">

                            <label>.</label><br>
                            <input type="submit" value="Valider" class="btn btn-primary">
                        </div>

                    </div>
                </form>
                <div class="table-responsive">
                <table class="table table-bordered  datatable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Photo</th>
                        <th>Agent</th>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Departement / Ville</th>
                        <th>Localisation</th>
                        <th></th>
                        <!--  <th></th>-->
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $agent = new \systeme\Model\Utilisateur();
                    $departement = new \app\DefaultApp\Models\Departement();
                    if (isset($listeSuccursal)) {
                        foreach ($listeSuccursal as $suc) {
                            $id_agent = $suc->getIdAgent();
                            $agent = $agent->findById($id_agent);
                            $id_departement = $suc->getIdDepartement();
                            $departement = $departement->findById($id_departement);
                            ?>
                            <tr>
                                <td><?= $suc->getId(); ?></td>
                                <td>
                                    <a href="<?= $suc->getPhoto() ?>" target="_blank"><img src="<?= $suc->getPhoto() ?>"
                                                                                           style="height: 50px"/></a>
                                </td>
                                <td><?= ucfirst($agent->getNom() . " " . $agent->getPrenom()) ?></td>

                                <td><?= stripslashes($suc->getNom()) ?></td>
                                <td><?= stripslashes($suc->getAddresse()) ?></td>
                                <td><?= stripslashes($suc->getTelephone()) ?></td>
                                <td><?= ucfirst($departement->getDepartement()) . "<br>" . $suc->getIdVille() ?></td>
                                <td>
                                    <a target="_blank"
                                       href="https://www.google.com/maps/dir//<?= $suc->getLatitude() ?>,<?= $suc->getLongitude() ?>"><?= $suc->getLatitude() ?>
                                        ,<?= $suc->getLongitude() ?></a>
                                </td>

                                <td>
                                    <a class="delete" href="modifier-succursal-<?= $suc->getId() ?>"><i
                                                style="color:red" class="fa fa-edit"></i></a>
                                </td>

                                <!--<td>
                                    <a class="delete" href="supprimer-succursal-<?/*= $suc->getId() */ ?>"><i
                                                style="color:red" class="fa fa-trash"></i></a>
                                </td>-->
                            </tr>

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
</div>