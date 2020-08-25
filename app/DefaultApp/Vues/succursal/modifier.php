<div class="row">
    <div class="col-md-12">
        <?= \systeme\Application\Application::block("menu_succursal") ?>
        <div class="card">
            <div class="card-header"><h4>Modifier Succursale</h4></div>

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
                        document.location.href = 'lister-succursal';
                    </script>
                    <?php
                }
                ?>
                <div class="message"></div>
                <form method="post" action="" class="form-ajouter-succursal" enctype="multipart/form-data">
                    <input type="hidden" name="modifier_succursal">
                    <input type="hidden" name="id" value="<?php if(isset($suc))echo $suc->getid() ?>">
                    <div class="row">

                        <div class="form-group col-12">
                            <label>Image</label><br>
                            <img id="blah" style="width:120px;max-height:100px;min-height:100px;"
                                 src="<?php if (isset($suc)) echo $suc->getPhoto() ?>" class="img-responsive"/>
                            <input accept="image/*" value="" type="file" name="fichier" id="imgInp"
                                   onchange="readURL(this);"/>
                        </div>

                        <div class="form-group col-4">
                            <label>Agent</label>
                            <select class="form-control" name="id_agent">
                                <?php
                                if (isset($suc)) {
                                    $id_agent = $suc->getIdAgent();
                                    $agent = new \systeme\Model\Utilisateur();
                                    $agent = $agent->findById($id_agent);
                                    if ($agent !== null) {
                                        ?>
                                        <option value="<?= $agent->getId() ?>"><?= $agent->getNom() . " " . $agent->getPrenom() ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-4">
                            <label>Departement</label>
                            <select class="form-control" name="id_departement">
                                <?php
                                if (isset($suc)) {
                                    $id_departement = $suc->getIdDepartement();
                                    $departement = new \app\DefaultApp\Models\Departement();
                                    $departement = $departement->findById($id_departement);
                                    if ($departement !== null) {
                                        ?>
                                        <option value="<?= $departement->getId() ?>"><?= stripslashes($departement->getDepartement()) ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-4">
                            <label>Ville</label>
                            <input value="<?php if(isset($suc))echo stripslashes($suc->getIdVille()); ?>" type="text" name="id_ville" class="form-control" required placeholder="Ville">
                        </div>

                        <div class="form-group col-4">
                            <label>Nom</label>
                            <input  value="<?php if(isset($suc))echo stripslashes($suc->getNom()); ?>" type="text" name="nom" class="form-control" required placeholder="Nom">
                        </div>

                        <div class="form-group col-4">
                            <label>Adresse</label>
                            <input value="<?php if(isset($suc))echo stripslashes($suc->getAddresse()); ?>" type="text" name="addresse" class="form-control" required placeholder="Addresse">
                        </div>

                        <div class="form-group col-4">
                            <label>Téléphone</label>
                            <input value="<?php if(isset($suc))echo stripslashes($suc->getTelephone()); ?>" type="text" name="telephone" class="form-control" required placeholder="Téléphone">
                        </div>

                        <div class="form-group col-6">
                            <label>Latitude</label>
                            <input value="<?php if (isset($_COOKIE['latitude']) and $_COOKIE['latitude'] !== null) echo $_COOKIE['latitude'] ?>"
                                   type="text" name="latitude" class="form-control" placeholder="Latitude">
                        </div>

                        <div class="form-group col-6">
                            <label>Longitude</label>
                            <input value="<?php if (isset($_COOKIE['longitude']) and $_COOKIE['longitude'] !== null) echo $_COOKIE['longitude'] ?>"
                                   type="text" name="longitude" class="form-control" placeholder="Longitude">
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
