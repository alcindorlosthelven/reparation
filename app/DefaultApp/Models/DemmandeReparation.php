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
    private $id_reparateur,$statut,$id_agent;
    private $note1,$note2,$preuve;

    /**
     * @return mixed
     */
    public function getPreuve()
    {
        return $this->preuve;
    }

    /**
     * @param mixed $preuve
     */
    public function setPreuve($preuve)
    {
        $this->preuve = $preuve;
    }



    /**
     * @return mixed
     */
    public function getNote1()
    {
        return $this->note1;
    }

    /**
     * @param mixed $note1
     */
    public function setNote1($note1)
    {
        $this->note1 = $note1;
    }

    /**
     * @return mixed
     */
    public function getNote2()
    {
        return $this->note2;
    }

    /**
     * @param mixed $note2
     */
    public function setNote2($note2)
    {
        $this->note2 = $note2;
    }

    /**
     * @return mixed
     */
    public function getIdReparateur()
    {
        return $this->id_reparateur;
    }

    /**
     * @param mixed $id_reparateur
     */
    public function setIdReparateur($id_reparateur)
    {
        $this->id_reparateur = $id_reparateur;
    }


    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param mixed $statut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    /**
     * @return mixed
     */
    public function getIdAgent()
    {
        return $this->id_agent;
    }

    /**
     * @param mixed $id_agent
     */
    public function setIdAgent($id_agent)
    {
        $this->id_agent = $id_agent;
    }



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

    public function listerParAgent($id_agent){
        $con=self::connection();
        $req="select *from demmande_reparation where id_agent=:id_agent";
        $stmt=$con->prepare($req);
        $stmt->execute(array(":id_agent"=>$id_agent));
        return $stmt->fetchAll(\PDO::FETCH_CLASS,__CLASS__);
    }

    public function listerParReparateur($id_reparateur){
        $con=self::connection();
        $req="select *from demmande_reparation where id_reparateur=:id_reparateur";
        $stmt=$con->prepare($req);
        $stmt->execute(array(":id_reparateur"=>$id_reparateur));
        return $stmt->fetchAll(\PDO::FETCH_CLASS,__CLASS__);
    }


}