<?php
use systeme\Application\Application as  App;
$role=\systeme\Model\Utilisateur::role();
if($role!=="reparateur"){
    ?>
    <a href="<?= App::genererUrl("ajouter_demmande"); ?>" class="btn btn-primary">Ajouter</a>
<?php
}
?>
<a href="<?= App::genererUrl("lister_demmande"); ?>" class="btn btn-primary">Lister</a>
<?php
if($role!=="agent" and $role!=="reparateur"){
 ?>
    <a href="<?= App::genererUrl("ajouter_categorie"); ?>" class="btn btn-success">Ajouter Categorie</a>
    <a href="<?= App::genererUrl("lister_categorie"); ?>" class="btn btn-success">Lister Categorie</a>

<?php
}
?>
<br>
<br>