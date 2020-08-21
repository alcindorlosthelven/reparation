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
 private $id,$categorie;

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