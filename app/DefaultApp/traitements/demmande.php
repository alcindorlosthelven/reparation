<?php
/**
 * reparation - demmande.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 8/21/2020
 */
require "../../../vendor/autoload.php";
if(isset($_POST['ajouter_demmande'])){
    $demmande=new \app\DefaultApp\Models\DemmandeReparation();
    $demmande->remplire($_POST);
    $fdev=array();
    $date=date("Y-m-d");
    $total = count($_FILES['fichier']['name']);
    for( $i=0 ; $i < $total ; $i++ ) {
        if (isset($_FILES['fichier']['name'][$i])) {
            $fichier = new \app\DefaultApp\Models\Fichier($_FILES['fichier']['name'][$i], $date . "" . date("dmyis"));
            if ($fichier->Upload($i)) {
                $fdev[]=$fichier->getSrc();
            }
        }
    }
    if(count($fdev)>0){
        $demmande->setFichier(implode(",",$fdev));
    }
    $demmande->setDate($date);
    $m=$demmande->add();
    echo $m;

}

if(isset($_POST['ajouter_categorie'])){
    $categorie=new \app\DefaultApp\Models\Categorie();
    $categorie->remplire($_POST);
    $m=$categorie->add();
    echo $m;
}

if(isset($_POST['modifier_categorie'])){
    $categorie=new \app\DefaultApp\Models\Categorie();
    $categorie->remplire($_POST);
    $m=$categorie->update();
    echo $m;
}