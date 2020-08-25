<?php
/**
 * Created by PhpStorm.
 * User: ALCINDOR LOSTHELVEN
 * Date: 24/03/2018
 * Time: 21:28
 */

namespace app\DefaultApp\Controlleurs;

use app\DefaultApp\Models\GeoLocalisation;
use app\DefaultApp\Models\Succursal;
use app\DefaultApp\Models\Utilisateur;
use app\DefaultApp\Models\Departement;

class SuccursalControlleur extends BaseControlleur
{

    public function ajouter()
    {
        try{
            $variable = array();
            $variable['titre'] = "Ajouter Succursal";
            if ($_SERVER['REQUEST_METHOD'] === "POST") {
                $suc=new Succursal();
                $suc->remplire($_POST);
                $m=$suc->add();

                if($m==="ok"){
                    $variable['success']="Enregistrer avec success";
                }else{
                    $variable['erreur']=$m;
                    $variable['suc']=$suc;
                }
            }
            $departement=new Departement();
            $listeDepartement=$departement->findAll();
            $listeAgent=Utilisateur::listeAgent();
            $variable['listeDepartement']=$listeDepartement;
            $variable['listeAgent']=$listeAgent;

            $this->render("succursal/ajouter", $variable);
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }

    public function modifier($id)
    {

        $variable = array();
        $variable['titre'] = "Modifier Succursal";
        $suc=new Succursal();
        $suc=$suc->findById($id);
        $variable['suc']=$suc;
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $suc->remplire($_POST);
            $suc->setId($id);
            $m=$suc->update();
            if($m==="ok"){
                $variable['success']="Modifier avec success";
            }else{
                $variable['erreur']=$m;
                $variable['suc']=$suc;
            }
        }

        $this->render("succursal/modifier", $variable);
    }

    public function lister()
    {
        $variable=array();
        $listeAgent=Utilisateur::listeAgent();
        $listeSuccursal = $this->getModel("succursal")->findAll();
        if(isset($_POST['id_agent'])){
            $agent=new Utilisateur();
            $agent=$agent->findById($_POST['id_agent']);
            $variable['agent']=$agent;
            $listeSuccursal =$this->getModel("succursal")->listerParAgent($_POST['id_agent']);
        }
        $variable['titre']="Liste des succursale";
        $variable['listeSuccursal']=$listeSuccursal;
        $variable['listeAgent']=$listeAgent;
        $this->render("succursal/lister", $variable);
    }


    public function supprimer($id)
    {
        $suc=new Succursal();
        $suc->deleteById($id);
        header("location: lister-succursal");
    }

}