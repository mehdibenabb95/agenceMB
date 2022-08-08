
<?php
require('model/classes/sejourclass.php');
class SejourManager{

private $lePDO;

public function __construct($unPDO){
    $this-> lePDO=$unPDO;
}




/* Une methode qui permet d'extraire tout les séjours de la table sejour de notre BDD
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

public function getSejourByVille($villeDestination){
    try{
        $connex = $this->lePDO;
       
        $sql = $connex -> prepare("SELECT * FROM sejour WHERE villeDestination=:villeDestination");
        

        $sql -> bindParam(":villeDestination", $villeDestination);
        $sql -> execute();
        $sql->setFetchMode(PDO::FETCH_CLASS,"Sejour");
        $resultat = ($sql -> fetch());
        return $resultat;
    }catch (PDOException $error){
        echo $error ->getMessage();
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
}
?>