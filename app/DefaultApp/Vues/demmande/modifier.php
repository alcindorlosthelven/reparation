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
            <div class="card-header"><h4>Ajouter Demmande</h4></div>

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

                <form method="post" action="" class="ajouter_demmande" enctype="multipart/form-data">
                    <input type="hidden" name="ajouter_demmande">
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Catégorie</label>
                            <select name="id_categorie" class="form-control" required>
                                <?php
                                if (isset($listeCategorie)) {
                                    foreach ($listeCategorie as $categorie) {
                                        ?>
                                        <option value="<?= $categorie->getId() ?>"><?= ucfirst(stripslashes($categorie->getCategorie())) ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-6">
                            <label>Succursal</label>
                            <select name="id_succursal" class="form-control" required>
                                <?php
                                if (isset($succursal)) {
                                    if ($succursal !== null) {
                                        ?>
                                        <option value="<?= $succursal->getId() ?>"><?= ucfirst(stripslashes($succursal->getNom())) ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Images / Video</label>
                        <input type="file" name="fichier[]" class="form-control" required multiple>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Enregistrer" class="btn btn-primary float-right">
                    </div>
                </form>

            </div>
        </div>


    </div>
</div>
