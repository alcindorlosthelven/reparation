<?php
/**
 * Created by PhpStorm.
 * User: alcin
 * Date: 4/14/2020
 * Time: 12:40 AM
 */

namespace app\DefaultApp\Models;


use systeme\Model\Model;

class Ville extends Model
{

    private $id,$ville;

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
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    public static function dernierId()
    {
        $con = self::connection();
        $req = "SELECT *FROM ville ORDER BY id DESC LIMIT 1";
        $rps = $con->query($req);
        $data = $rps->fetch();
        $id = $data['id'];
        return $id;
    }

    public static function rechercherParNom($nom){
        try {
            $con = self::connection();
            $req = "SELECT *FROM ville where ville=:nom";
            $stmt = $con->prepare($req);
            $stmt->execute(
                array(
                    ":nom"=>$nom
                )
            );

            $res = $stmt->fetchAll(\PDO::FETCH_CLASS, "app\\sge\\Models\\Ville");
            if(count($res)>0){
                return $res[0];
            }else{
                return null;
            }
        } catch (\Exception $ex) {
            throw new \Exception("cour: " . $ex->getMessage());
        }
    }
}