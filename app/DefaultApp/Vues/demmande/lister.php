<div class="row">
    <div class="col-md-12">
        <?= \systeme\Application\Application::block("menu_demmande") ?>
        <div class="card">
            <div class="card-header"><h4>Liste des demmandes</h4></div>

            <div class="card-body">
                <table class="table table-bordered  datatable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Catégorie</th>
                        <th>Succursal</th>
                        <th>Date</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $cat=new \app\DefaultApp\Models\Categorie();
                    $succursal=new \app\DefaultApp\Models\Succursal();
                    if (isset($listeDemmande)) {
                        foreach ($listeDemmande as $suc) {
                            $id_succursal=$suc->getIdSuccursal();
                            $id_categorie=$suc->getIdCategorie();
                            $cat=$cat->findById($id_categorie);
                            $succursal=$succursal->findById($id_succursal);
                            ?>
                            <tr>
                                <td><?= $suc->getId(); ?></td>
                                <td><?= stripslashes($cat->getCategorie()) ?></td>
                                <td><?= stripslashes($succursal->getNom()) ?></td>
                                <td><?= stripslashes($suc->getDate()) ?></td>
                                <td><a href="fiche-demmande-<?= $suc->getId() ?>">Afficher</a></td>

                                <td>
                                    <a class="delete" href="supprimer-demmande-<?= $suc->getId() ?>"><i
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