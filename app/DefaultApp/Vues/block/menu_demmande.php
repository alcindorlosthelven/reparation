<?php
use systeme\Application\Application as  App;
?>
<a href="<?= App::genererUrl("ajouter_demmande"); ?>" class="btn btn-primary">Ajouter</a>
<a href="<?= App::genererUrl("lister_demmande"); ?>" class="btn btn-primary">Lister</a>
<a href="<?= App::genererUrl("ajouter_categorie"); ?>" class="btn btn-success">Ajouter Categorie</a>
<a href="<?= App::genererUrl("lister_categorie"); ?>" class="btn btn-success">Lister Categorie</a>
<br>
<br>