<?php
/**
 * reparation - demmande.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 8/21/2020
 */
require "../../../vendor/autoload.php";
if (isset($_POST['ajouter_demmande'])) {
    $demmande = new \app\DefaultApp\Models\DemmandeReparation();
    $demmande->remplire($_POST);
    $fdev = array();
    $date = date("Y-m-d");
    $total = count($_FILES['fichier']['name']);
    for ($i = 0; $i < $total; $i++) {
        if (isset($_FILES['fichier']['name'][$i])) {
            $fichier = new \app\DefaultApp\Models\Fichier($_FILES['fichier']['name'][$i], $date . "" . date("dmyis"));
            if ($fichier->Upload($i)) {
                $fdev[] = $fichier->getSrc();
            }
        }
    }
    if (count($fdev) > 0) {
        $demmande->setFichier(implode(",", $fdev));
    }
    $demmande->setDate($date);
    $demmande->setStatut("en attent");
    $demmande->setIdReparateur("n/a");
    $demmande->setNote1("n/a");
    $demmande->setNote2("n/a");
    $demmande->setPreuve("n/a");
    $m = $demmande->add();
    echo $m;

}

if (isset($_POST['ajouter_categorie'])) {
    $categorie = new \app\DefaultApp\Models\Categorie();
    $categorie->remplire($_POST);
    $m = $categorie->add();
    echo $m;
}

if (isset($_POST['modifier_categorie'])) {
    $categorie = new \app\DefaultApp\Models\Categorie();
    $categorie->remplire($_POST);
    $m = $categorie->update();
    echo $m;
}

if (isset($_POST['attribuer'])) {
    $id = $_POST['id'];
    $id_reparateur = $_POST['id_reparateur'];
    $demmande = new \app\DefaultApp\Models\DemmandeReparation();
    $demmande = $demmande->findById($id);
    $demmande->setStatut("attribuer a réparateur");
    $demmande->setIdReparateur($id_reparateur);
    $m = $demmande->update();
    echo $m;
}

if (isset($_POST['confirmer_attribution'])) {
    $id = $_POST['id'];
    $reponse = trim(addslashes($_POST['reponse']));
    $demmande = new \app\DefaultApp\Models\DemmandeReparation();
    $demmande = $demmande->findById($id);
    if ($reponse === "oui") {
        $demmande->setStatut("encours");
    } else {
        $demmande->setStatut("refuser par réparateur");
    }

    $m = $demmande->update();
    echo $m;
}

if(isset($_POST['type_note'])){
    $note="";
    $demmande=new \app\DefaultApp\Models\DemmandeReparation();
    $type_note=$_POST['type_note'];
    $id=$_POST['id'];
    $demmande=$demmande->findById($id);
    if($type_note==="note1") {
        $fichier = new \app\DefaultApp\Models\Fichier($_FILES['fichier']['name'], "note_avance_1_$id");
    }else{
        $fichier = new \app\DefaultApp\Models\Fichier($_FILES['fichier']['name'], "note_avance_final_$id");
    }
    if($fichier->upload()){
        $note=$fichier->getSrc();
    }
    if($type_note==="note1"){
        $demmande->setNote1($note);
    }else{
        $demmande->setNote2($note);
    }
    $m=$demmande->update();
    echo $m;
}

if(isset($_POST['preuve'])){
    $id = $_POST['id'];
    $demmande = new \app\DefaultApp\Models\DemmandeReparation();
    $demmande = $demmande->findById($id);

    $fdev = array();
    $date = date("Y-m-d");
    $total = count($_FILES['fichier']['name']);
    for ($i = 0; $i < $total; $i++) {
        if (isset($_FILES['fichier']['name'][$i])) {
            $fichier = new \app\DefaultApp\Models\Fichier($_FILES['fichier']['name'][$i], "preuve_finalisation_$id".$i);
            if ($fichier->Upload($i)) {
                $fdev[] = $fichier->getSrc();
            }
        }
    }
    if (count($fdev) > 0) {
        $demmande->setPreuve(implode(",", $fdev));
    }

    $m=$demmande->update();
    echo $m;
}

if(isset($_POST['explication'])){
    $explication=trim(addslashes($_POST['contenue']));
    if(empty($explication)){
        echo "Entrer une explication";
        return;
    }
    $id = $_POST['id'];
    $demmande = new \app\DefaultApp\Models\DemmandeReparation();
    $demmande = $demmande->findById($id);
    $demmande->setExplicationAdditionel($explication);
    $m=$demmande->update();
    echo $m;
}

if(isset($_POST['reponse_explication'])){
    $explication=trim(addslashes($_POST['contenue']));
    if(empty($explication)){
        echo "Entrer une reponse";
        return;
    }
    $id = $_POST['id'];
    $demmande = new \app\DefaultApp\Models\DemmandeReparation();
    $demmande = $demmande->findById($id);
    $demmande->setReponseExplication($explication);
    $m=$demmande->update();
    echo $m;
}