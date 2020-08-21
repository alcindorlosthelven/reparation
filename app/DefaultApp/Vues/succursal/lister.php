<div class="row">
    <div class="col-md-12">
        <?= \systeme\Application\Application::block("menu_succursal") ?>
        <div class="card">
            <div class="card-header"><h4>Liste des Succursals</h4></div>

            <div class="card-body">
                <table class="table table-bordered  datatable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    if (isset($listeSuccursal)) {
                        foreach ($listeSuccursal as $suc) {
                            ?>
                            <tr>
                                <td><?= $suc->getId(); ?></td>
                                <td><?= stripslashes($suc->getNom()) ?></td>
                                <td><?= stripslashes($suc->getAddresse()) ?></td>
                                <td><?= stripslashes($suc->getTelephone()) ?></td>

                                <td>
                                    <a class="delete" href="modifier-succursal-<?= $suc->getId() ?>"><i
                                                style="color:red" class="fa fa-edit"></i></a>
                                </td>

                                <td>
                                    <a class="delete" href="supprimer-succursal-<?= $suc->getId() ?>"><i
                                                style="color:red" class="fa fa-trash"></i></a>
                                </td>
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