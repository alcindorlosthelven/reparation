<div class="row">
    <div class="col-md-12">
        <?= \systeme\Application\Application::block("menu_demmande") ?>
        <?php
        if (isset($fiche)) {
            $id_categorie = $fiche->getIdCategorie();
            $id_succursal = $fiche->getIdSuccursal();
            $cat = new \app\DefaultApp\Models\Categorie();
            $cat = $cat->findById($id_categorie);
            $succursal = new \app\DefaultApp\Models\Succursal();
            $succursal = $succursal->findById($id_succursal);
        }
        ?>
        <div class="card">
            <div class="card-header"><h4>Fiche Demmande</h4></div>

            <div class="card-body">

                <div class="message"></div>

                <form method="post" action="" class="ajouter_demmande" enctype="multipart/form-data">
                    <input type="hidden" name="ajouter_demmande">
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Catégorie</label>
                            <input readonly value="<?php if (isset($cat)) echo stripslashes($cat->getCategorie()); ?>"
                                   type="text" class="form-control">
                        </div>

                        <div class="form-group col-6">
                            <label>Succursal</label>
                            <input readonly
                                   value="<?php if (isset($succursal)) echo stripslashes($succursal->getNom()) ?>"
                                   type="text" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Description</label><br>
                        <strong><?php if (isset($fiche)) echo stripslashes($fiche->getDescription()) ?></strong>
                    </div>

                    <?php
                    if (isset($fiche)) {
                        $fichier = $fiche->getFichier();
                        $fichier = explode(",", $fichier);

                        ?>
                        <h3>Liste Fichier</h3>
                        <div class="row">
                            <?php
                            foreach ($fichier as $f) {
                                ?>
                                <div class="col-6" style="border: 1px solid black">
                                    <object
                                            data="<?= $f ?>"
                                            width="100%"
                                            height="500">
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
                </form>

            </div>
        </div>


    </div>
</div>
