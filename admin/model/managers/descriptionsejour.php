<?php 
 require("../model/classes/descriptionsejour.class.php");



 class DescriptionSejourManager{

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


    public function addDescriptionSejour(Descriptionsejour $Description){
        try {
            $connex=$this->lePDO;
            $sql =$connex->prepare("INSERT INTO descriptionsejour (titre, image, titreImage, texte, numOrdre,idSejour) VALUES (:titre, :image, :titreImage, :texte, :numOrdre, :idSejour)");
            $sql->bindValue(":titre", $Description->getTitre());
            $sql->bindValue(":image", $Description->getImage());
            $sql->bindValue(":titreImage", $Description->getTitreImage());
            $sql->bindValue(":texte", $Description->getTexte());
            $sql->bindValue(":numOrdre", $Description->getNumOrdre());
            $sql->bindValue(":idSejour", $Description->getIdSejour());
            return $sql->execute();
            
    
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function getAlldescriptionSejour(){

        try {
           
            $connex=$this->lePDO;
            $sql =$connex->prepare("SELECT * FROM descriptionsejour ORDER BY idDescription");
            $sql->execute();
            $resultat = ($sql->fetchAll(PDO::FETCH_CLASS, "Descriptionsejour"));
            return $resultat;
    
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
    
    public function getDescriptionSejourByIdDescription($idDescription)
    {
        try {
            $connex=$this->lePDO;
            $sql =$connex->prepare("SELECT * FROM descriptionsejour WHERE idDescription =:uneId ORDER BY numOrdre ");
            $sql->bindParam(":uneId", $idDescription);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS,"Descriptionsejour");
            $resultat = ($sql->fetch());
            return $resultat;
    
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
    
    
    public function updateDescrpiptionSejour(Descriptionsejour $uneDescriptionSejour){
        try {
            $connex=$this->lePDO;
            
            $sql =$connex->prepare("UPDATE descriptionsejour set titre=:titre, image=:image,titreImage=:titreImage,texte=:texte, numOrdre=:numOrdre,idSejour=:idSejour WHERE idDescription=:id ");
            $sql->bindValue(":titre", $uneDescriptionSejour->getTitre());
            $sql->bindValue(":image", $uneDescriptionSejour->getImage());
            $sql->bindValue(":titreImage", $uneDescriptionSejour->getTitreImage());
            $sql->bindValue(":texte", $uneDescriptionSejour->getTexte());
            $sql->bindValue(":numOrdre", $uneDescriptionSejour->getNumOrdre());
            $sql->bindValue(":idSejour", $uneDescriptionSejour->getIdSejour());
            $sql->bindValue(":id", $uneDescriptionSejour->getIdDescription());
            return $sql->execute();
            
    
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function deleteDescriptionById($idDescription){
        try {
            $connex=$this->lePDO;
            $sql =$connex->prepare("DELETE FROM descriptionsejour WHERE idDescription=:uneId ");        
            $sql->bindParam(":uneId", $idDescription);
            return $sql->execute();
            
    
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function getPreviousDescriptionSejour(Descriptionsejour $description)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT MAX(c.idDescription) FROM descriptionsejour as c WHERE c.idDescription < :id"); /* : pour eviter les injection sql*/
        $sql->bindValue(":id", $description->getIdDescription());
        $sql->execute();
        $resultat = ($sql->fetchColumn());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function getNextDescriptionSejour(Descriptionsejour $description)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT MIN(c.idDescription) FROM descriptionsejour as c WHERE c.idDescription> :id"); /* : pour eviter les injection sql*/
        $sql->bindValue(":id", $description->getIdDescription());
        $sql->execute();
        $resultat = ($sql->fetchColumn());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}
 }


?>