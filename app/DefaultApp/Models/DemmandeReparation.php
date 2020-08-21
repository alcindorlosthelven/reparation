<?php
/**
 * reparation - DemmandeReparation.php
 * Create by ALCINDOR LOSTHELVEN
 * Created on: 8/20/2020
 */

namespace app\DefaultApp\Models;


use systeme\Model\Model;

class DemmandeReparation extends Model
{

    protected $table = "demmande_reparation";
    private $id,$id_succursal,$id_categorie,$description,$fichier,$date;

    /**
     * @return mixed
     */
    public function getFichier()
    {
        return $this->fichier;
    }

    /**
     * @param mixed $fichier
     */
    public function setFichier($fichier)
    {
        $this->fichier = $fichier;
    }



    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param string $table
     */
    public function setTable($table)
    {
        $this->table = $table;
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
    public function getIdSuccursal()
    {
        return $this->id_succursal;
    }

    /**
     * @param mixed $id_succursal
     */
    public function setIdSuccursal($id_succursal)
    {
        $this->id_succursal = $id_succursal;
    }

    /**
     * @return mixed
     */
    public function getIdCategorie()
    {
        return $this->id_categorie;
    }

    /**
     * @param mixed $id_categorie
     */
    public function setIdCategorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function listerParSuccursal($id_succursal){
        $con=self::connection();
        $req="select *from demmande_reparation where id_succursal=:id_succursal";
        $stmt=$con->prepare($req);
        $stmt->execute(array(":id_succursal"=>$id_succursal));
        return $stmt->fetchAll(\PDO::FETCH_CLASS,__CLASS__);
    }


}