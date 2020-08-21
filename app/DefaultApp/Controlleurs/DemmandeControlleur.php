<?php
/**
 * Created by PhpStorm.
 * User: ALCINDOR LOSTHELVEN
 * Date: 24/03/2018
 * Time: 21:28
 */

namespace app\DefaultApp\Controlleurs;

use app\DefaultApp\Models\Categorie;
use app\DefaultApp\Models\DemmandeReparation;
use app\DefaultApp\Models\Succursal;
use app\DefaultApp\Models\Utilisateur;

class DemmandeControlleur extends BaseControlleur
{

    public function ajouter()
    {
        try{
            $variable = array();
            $variable['titre'] = "Ajouter Demmande";
            $categorie=new Categorie();
            $succursal=new Succursal();
            $listeCategorie=$categorie->findAll();
            $listeSuccursal=$succursal->findAll();
            $variable['listeCategorie']=$listeCategorie;
            $variable['listeSuccursal']=$listeSuccursal;


            if ($_SERVER['REQUEST_METHOD'] === "POST") {

            }
            $this->render("demmande/ajouter", $variable);
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }

    public function fiche($id)
    {

        try{
            $variable = array();
            $variable['titre'] = "Fiche Demmande";
            $fiche=new DemmandeReparation();
            $fiche=$fiche->findById($id);
            if($fiche!==null){
                $variable['fiche']=$fiche;
            }
            $this->render("demmande/fiche", $variable);
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }

    public function modifier($id)
    {

        $variable = array();
        $variable['titre'] = "Modifier demmande";
        if ($_SERVER['REQUEST_METHOD'] === "POST") {

        }

        $this->render("demmande/modifier", $variable);
    }

    public function lister()
    {
        $role=Utilisateur::role();
        if($role==="agent"){
            $id_user=Utilisateur::session_valeur();
            $u=Utilisateur::Rechercher($id_user);
            $listeDemmande = $this->getModel("demmandeReparation")->listerParSuccursal($u->getIdSuccursal());
        }else{
            $listeDemmande = $this->getModel("demmandeReparation")->findAll();
        }

        $variable = array("titre" => "Liste des demmande", "listeDemmande" => $listeDemmande);
        $this->render("demmande/lister", $variable);
    }

    public function supprimer($id)
    {
        $suc=new DemmandeReparation();
        $suc->deleteById($id);
        header("location: lister-demmande");
    }

    public function ajouterCategorie()
    {
        try{
            $variable = array();
            $variable['titre'] = "Ajouter Categorie";

            if ($_SERVER['REQUEST_METHOD'] === "POST") {

            }
            $this->render("demmande/ajouter_categorie", $variable);
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }

    public function listerCategorie()
    {
        $listeCategorie = $this->getModel("categorie")->findAll();
        $variable = array("titre" => "Liste des categorie", "listeCategorie" => $listeCategorie);
        $this->render("demmande/lister_categorie", $variable);
    }

    public function modifierCategorie($id)
    {

        $variable = array();
        $variable['titre'] = "Modifier demmande";
        $categorie=new Categorie();
        $categorie=$categorie->findById($id);
        if($categorie!==null){
            $variable['categorie']=$categorie;
        }
        if ($_SERVER['REQUEST_METHOD'] === "POST") {

        }

        $this->render("demmande/modifier_categorie", $variable);
    }


}