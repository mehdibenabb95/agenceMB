<?php
 require("../model/classes/sejour.class.php");
 
class SejourManager{

    private $lePDO;

    public function __construct($unPDO){
        $this-> lePDO=$unPDO;
    }

   
    /**
     * Get the value of lePDO
     */ 
    public function getLePDO()
    {
        return $this->lePDO;
    }

    /**
     * Set the value of lePDO
     *
     * @return  self
     */ 
    public function setLePDO($lePDO)
    {
        $this->lePDO = $lePDO;

        return $this;
    }


/* Une methode qui permet d'extraire tout les séjours de la table sejour de notre lePDO
@Return Un array d'objets  de la classe sejour
*/
public function getAllSejour(){

    try {
       
        $connex=$this->lePDO;

        
        $sql =$connex->prepare("SELECT * FROM sejour ORDER BY idSejour");
        $sql->execute();
        $resultat = ($sql->fetchAll(PDO::FETCH_CLASS, "Sejour"));
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function getSejourById($id)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT * FROM sejour WHERE idSejour=:uneId ");
        $sql->bindParam(":uneId", $id);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_CLASS,"Sejour");
        $resultat = ($sql->fetch());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}


public function updateSejour(Sejour $unSejour){
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("UPDATE sejour set code=:code, villeDepart=:villeDepart,villeDestination=:villeDestination,dateDepart=:dateDepart,dateArrivee=:dateArrivee,placeTotal=:placeTotal,placeLibre=:placeLibre,prix=:prix,description=:description,image=:image WHERE idSejour=:id ");
        $sql->bindValue(":code", $unSejour->getCode());
        $sql->bindValue(":villeDepart", $unSejour->getVilleDepart());
        $sql->bindValue(":villeDestination", $unSejour->getVilleDestination());
        $sql->bindValue(":dateDepart", $unSejour->getDateDepart());
        $sql->bindValue(":dateArrivee", $unSejour->getDateArrivee());
        $sql->bindValue(":placeTotal", $unSejour->getPlaceTotal());
        $sql->bindValue(":placeLibre", $unSejour->getPlaceLibre());
        $sql->bindValue(":prix", $unSejour->getPrix());
        $sql->bindValue(":description", $unSejour->getDescription());
        $sql->bindValue(":image", $unSejour->getImage());
        $sql->bindValue(":id", $unSejour->getIdSejour());
        return $sql->execute();
        

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function addSejour(Sejour $unSejour){
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("INSERT INTO  sejour (code,villeDepart,villeDestination,dateDepart,dateArrivee,placeTotal,placeLibre,prix,description,image) VALUES(:code,:villeDepart,:villeDestination,:dateDepart,:dateArrivee,:placeTotal,:placeLibre,:prix,:description,:image)");
     
        $sql->bindValue(":code", $unSejour->getCode());
        $sql->bindValue(":villeDepart", $unSejour->getVilleDepart());
        $sql->bindValue(":villeDestination", $unSejour->getVilleDestination());
        $sql->bindValue(":dateDepart", $unSejour->getDateDepart());
        $sql->bindValue(":dateArrivee", $unSejour->getDateArrivee());
        $sql->bindValue(":placeTotal", $unSejour->getPlaceTotal());
        $sql->bindValue(":placeLibre", $unSejour->getPlaceLibre());
        $sql->bindValue(":prix", $unSejour->getPrix());
        $sql->bindValue(":description", $unSejour->getDescription());
        $sql->bindValue(":image", $unSejour->getImage());
        return $sql->execute();
        

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function deleteSejourById($id){
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("DELETE FROM sejour WHERE idSejour=:uneId ");        
        $sql->bindParam(":uneId", $id);
        return $sql->execute();
        

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function getSejourBydate($dateDepart, $dateArrivee)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT * FROM sejour WHERE dateDepart=:dateDepart and dateArrivee=:dateArrivee "); /* : pour eviter les injection sql*/
        $sql->bindParam(":dateDepart", $dateDepart);
        $sql->bindParam(":dateDestination", $dateArrivee);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_CLASS,"Sejour");
        $resultat = ($sql->fetch());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function getSejourByVille($villeDepart, $villeDestination)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT * FROM sejour WHERE villeDepart=:villeDepart and villeDestination=:villeDestination "); /* : pour eviter les injection sql*/
        $sql->bindParam(":villeDepart", $villeDepart);
        $sql->bindParam(":villeDestination", $villeDestination);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_CLASS,"Sejour");
        $resultat = ($sql->fetch());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function getSejourByVilleDestination($villeDestination)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT * FROM sejour WHERE villeDestination=:villeDestination"); /* : pour eviter les injection sql*/
        $sql->bindParam(":villeDestination", $villeDestination);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_CLASS,"Sejour");
        $resultat = ($sql->fetch());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function getSejourByVilleDepart($villeDepart)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT * FROM sejour WHERE villeDepart=:villeDepart"); /* : pour eviter les injection sql*/
        $sql->bindParam(":villeDepart", $villeDepart);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_CLASS,"Sejour");
        $resultat = ($sql->fetch());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

/* fontion pour générer des codes automatiquement */

public function getNextCode()
{
    $prefix = "SEJ";
    $max = 0;
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT MAX(CAST(idSejour AS SIGNED)) as max FROM sejour");
        $sql->execute();
        $resultat = ($sql->fetchColumn());
        if ($resultat) $max =  $resultat;
        $date = date('my');
        $num = sprintf("%04s", $max + 1);
        return $prefix.$date."-".$num;


    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function getPreviousSejour(Sejour $unSejour)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT MAX(s.idSejour) FROM sejour as s WHERE s.idSejour < :id"); 
        $sql->bindValue(":id", $unSejour->getIdSejour());
        $sql->execute();
        $resultat = ($sql->fetchColumn());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function getNextSejour(Sejour $unSejour)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT MIN(s.idSejour) FROM sejour as s WHERE s.idSejour > :id");
        $sql->bindValue(":id", $unSejour->getIdSejour());
        $sql->execute();
        $resultat = ($sql->fetchColumn());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}


}

?>