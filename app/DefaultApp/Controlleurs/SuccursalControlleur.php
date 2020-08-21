<?php
/**
 * Created by PhpStorm.
 * User: ALCINDOR LOSTHELVEN
 * Date: 24/03/2018
 * Time: 21:28
 */

namespace app\DefaultApp\Controlleurs;

use app\DefaultApp\Models\Succursal;
use app\DefaultApp\Models\Utilisateur;

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
        $listeUtilisateur = $this->getModel("succursal")->findAll();
        $variable = array("titre" => "Liste des succursal", "listeSuccursal" => $listeUtilisateur);
        $this->render("succursal/lister", $variable);
    }


    public function supprimer($id)
    {
        $suc=new Succursal();
        $suc->deleteById($id);
        header("location: lister-succursal");
    }

}