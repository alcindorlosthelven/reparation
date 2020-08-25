<?php
/**
 * Created by PhpStorm.
 * User: alcin
 * Date: 4/14/2020
 * Time: 12:39 AM
 */

namespace app\DefaultApp\Models;


use systeme\Model\Model;

class Departement extends Model
{
    private $id, $departement;

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
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * @param mixed $departement
     */
    public function setDepartement($departement)
    {
        $this->departement = $departement;
    }

}