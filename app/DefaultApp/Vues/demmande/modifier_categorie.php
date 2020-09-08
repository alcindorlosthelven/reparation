<?php

use app\DefaultApp\Models\Utilisateur;

?>
<div class="row">
    <div class="col-md-12">
        <?= \systeme\Application\Application::block("menu_demmande") ?>
        <?php
        $id_user = Utilisateur::session_valeur();
        $user = Utilisateur::Rechercher($id_user);
        $succursal = new \app\DefaultApp\Models\Succursal();
        $succursal = $succursal->findById($user->getIdSuccursal());
        ?>
        <div class="card">
            <div class="card-header"><h4>Ajouter Catégorie</h4></div>

            <div class="card-body">

                <div class="message"></div>

                <form method="post" action="" class="ajouter_categorie" enctype="multipart/form-data">
                    <input type="hidden" name="modifier_categorie">
                    <input type="hidden" name="id" value="<?php if (isset($categorie)) echo $categorie->getId() ?>">
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Catégorie</label>
                            <input value="<?php if (isset($categorie)) echo $categorie->getCategorie() ?>" type="text"
                                   name="categorie" class="form-control" required>
                        </div>

                        <div class="col-6 form-group">
                            <label>Montant</label>
                            <input value="<?php if (isset($categorie)) echo $categorie->getMontant() ?>" min="50" name="montant" type="number" step="any" class="form-control" required>
                        </div>

                        <div class="col-6 form-group">
                            <label>Pourcentage Avance %</label>
                            <input value="<?php if (isset($categorie)) echo $categorie->getPourcentageAvance() ?>" name="pourcentage_avance" min="1" max="100" type="number" step="any"
                                   class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Modifier" class="btn btn-primary float-right">
                    </div>
                </form>

            </div>
        </div>


    </div>
</div>
