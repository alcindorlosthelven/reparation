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
                <?php
                if (isset($erreur)) {
                    ?>
                    <div class="alert alert-danger">
                        <?= $erreur ?>
                    </div>
                    <?php
                }
                ?>

                <?php
                if (isset($success)) {
                    ?>
                    <div class="alert alert-success">
                        <?= $success ?>
                    </div>
                    <script>
                        alert('<?=$success?>');
                        document.location.href = 'ajouter-succursal';
                    </script>
                    <?php
                }
                ?>

                <div class="message"></div>

                <form method="post" action="" class="ajouter_categorie" enctype="multipart/form-data">
                    <input type="hidden" name="ajouter_categorie">
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Catégorie</label>
                            <input type="text" name="categorie" class="form-control" required>
                        </div>

                        <div class="col-6 form-group">
                            <label>Montant</label>
                            <input min="50" name="montant" type="number" step="any" class="form-control" required>
                        </div>

                        <div class="col-6 form-group">
                            <label>Pourcentage Avance %</label>
                            <input name="pourcentage_avance" min="1" max="100" type="number" step="any" class="form-control" required>
                        </div>

                    </div>

                    <div class="form-group">
                        <input type="submit" value="Enregistrer" class="btn btn-primary float-right">
                    </div>
                </form>

            </div>
        </div>


    </div>
</div>
