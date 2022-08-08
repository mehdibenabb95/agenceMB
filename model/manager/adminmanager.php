<?php 
require_once ('model/classes/adminclass.php');

class AdminManager{
    private $lePDO;
public function __construct($unPDO)
{
    $this->lePDO=$unPDO;
}



public function getAllAdmin(){

    try {
       
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT * FROM admin ORDER BY idAdmin");
        $sql->execute();
        $resultat = ($sql->fetchAll(PDO::FETCH_CLASS, "Admin"));
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}
public function addAdmin(Admin $unAdmin){
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("INSERT INTO  admin (nom, prenom,email,mdp) VALUES(:nom, :prenom,:email,:mdp)");
        // sql va stocker un pdo statement 
        $sql->bindValue(":nom", $unAdmin->getNom());
        $sql->bindValue(":prenom", $unAdmin->getPrenom());
        $sql->bindValue(":email", $unAdmin->getEmail());
        $sql->bindValue(":id", $unAdmin->getIdAdmin());
        $sql->bindValue(":mdp", $unAdmin->getmdp());
        $sql->execute();
        

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function connexionAdmin($email, $mdp)
{
    try {
        $connex= $this->lePDO;
        // prepare c'est qu'il va preparé la requete pour l'execution
        $sql = $connex->prepare("SELECT * FROM admin WHERE email = :email AND mdp = :mdp");

        $sql->bindParam(":email", $email);

        $sql->bindParam(":mdp", $mdp);
        // execute c'est pour envoyer à la bdd
        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_CLASS, 'Admin');
        

        return $result;
    } catch (PDOException $error) {

        echo $error->getMessage();
    }
}



public function getAdminByEmailAndPassword($email,$hashmdp)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT * FROM admin WHERE email=:email and mdp=:hashmdp ");
        $sql->bindParam(":email", $email);
        $sql->bindParam(":hashmdp", $hashmdp);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_CLASS,"Admin");
        $resultat = ($sql->fetch());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}















}




















?>