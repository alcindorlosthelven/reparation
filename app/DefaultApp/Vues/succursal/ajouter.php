<div class="row">
    <div class="col-md-12">
        <?= \systeme\Application\Application::block("menu_succursal") ?>
        <div class="card">
            <div class="card-header"><h4>Ajouter Succursale</h4></div>

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
                        document.location.href='ajouter-succursal';
                    </script>
                    <?php
                }
                ?>

                <form method="post" action="">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" name="nom" class="form-control" required placeholder="Nom">
                    </div>

                    <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" name="addresse" class="form-control" required placeholder="Addresse">
                    </div>

                    <div class="form-group">
                        <label>Téléphone</label>
                        <input type="text" name="telephone" class="form-control" required placeholder="Telephone">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Enregistrer" class="btn btn-primary float-right">
                    </div>
                </form>

            </div>
        </div>


    </div>
</div>
