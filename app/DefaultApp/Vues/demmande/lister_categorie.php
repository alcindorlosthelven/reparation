<div class="row">
    <div class="col-md-12">
        <?= \systeme\Application\Application::block("menu_demmande") ?>
        <div class="card">
            <div class="card-header"><h4>Liste des catégorie</h4></div>

            <div class="card-body">
                <table class="table table-bordered  datatable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Catégorie</th>
                        <th>Montant</th>
                        <th>Pourcentage Avance</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    if (isset($listeCategorie)) {
                        foreach ($listeCategorie as $suc) {

                            ?>
                            <tr>
                                <td><?= $suc->getId(); ?></td>
                                <td><?= stripslashes($suc->getCategorie()) ?></td>
                                <td><?= \app\DefaultApp\DefaultApp::formatComptable($suc->getMontant()) ?></td>
                                <td><?= $suc->getPourcentageAvance() ?> % </td>

                                <td>
                                    <a class="delete" href="modifier-categorie-<?= $suc->getId() ?>"><i style="color:red" class="fa fa-edit"></i></a>
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