<?php
/**
 * reparation - Categorie.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 8/20/2020
 */

namespace app\DefaultApp\Models;


use systeme\Model\Model;

class Categorie extends Model
{
    private $id, $categorie, $montant, $pourcentage_avance;

    /**
     * @return mixed
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * @param mixed $montant
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
    }

    /**
     * @return mixed
     */
    public function getPourcentageAvance()
    {
        return $this->pourcentage_avance;
    }

    /**
     * @param mixed $pourcentage_avance
     */
    public function setPourcentageAvance($pourcentage_avance)
    {
        $this->pourcentage_avance = $pourcentage_avance;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

}