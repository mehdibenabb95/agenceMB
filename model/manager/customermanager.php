<?php
ini_set('display_errors', 'on');
require('model/classes/customerclass.php');
// require("./model/bdd.php");
class CustomerManager
{
    private $lePDO;
    public function __construct($unPDO)
    {
        $this->lePDO = $unPDO;
    }





    // Pour creer un client   
    public function creerCustomer(Customer $customer)
    {
        try {
            $connex = $this->lePDO;

            $sql = $connex->prepare("INSERT INTO customer (adresse, codePostal,email, gendre, mdp, nom, prenom, telephone,ville ) 
            VALUES (:adresse, :codePostal, :email, :gendre, :mdp, :nom, :prenom, :telephone, :ville )");
            $sql->bindValue(":adresse", $customer->getAdresse());
            $sql->bindValue(":codePostal", $customer->getCodePostal());
            $sql->bindValue(":email", $customer->getEmail());
            $sql->bindValue(":gendre", $customer->getGendre());
            $sql->bindValue(":mdp", $customer->getMdp());
            $sql->bindValue(":nom", $customer->getNom());
            $sql->bindValue(":prenom", $customer->getPrenom());
            $sql->bindValue(":telephone", $customer->getTelephone());
            $sql->bindValue(":ville", $customer->getVille());

            $sql->execute();
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
    public function connexionCustomer($email, $mdp)
    {
        try {
            $connex = $this->lePDO;
            
            $sql = $connex->prepare("SELECT * FROM customer WHERE email = :email AND mdp = :mdp");

            $sql->bindParam(":email", $email);

            $sql->bindParam(":mdp", $mdp);
           
            $sql->execute();

            $result = $sql->fetchAll(PDO::FETCH_CLASS, 'Customer');
            return $result;
        } catch (PDOException $error) {

            echo $error->getMessage();
        }
    }
    public function getCustomerById($id)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM customer WHERE idCustomer=:uneId ");
            $sql->bindParam(":uneId", $id);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "Customer");
            $resultat = ($sql->fetch());
            return $resultat;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    
    public function getCustomerByEmailAndPassword($email,$mdp)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT * FROM customer WHERE email=:email and mdp=:mdp "); 
        $sql->bindParam(":email", $email);
        $sql->bindParam(":mdp", $mdp);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_CLASS,"Customer");
        $resultat = ($sql->fetch());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}


public function getCustomerByEmail($email)
{
    try {
        
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT * FROM customer WHERE email = :email"); 
        $sql->bindParam(":email", $email);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_CLASS,"Customer");
        $resultat = ($sql->fetch());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}
public function updateCustomer(Customer $customers){
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare(" UPDATE customer set gendre= :gendre, nom= :nom, prenom=:prenom,email=:email, 
        telephone= :telephone, adresse= :adresse, ville=:ville, codePostal=:codePostal WHERE idCustomer= :id ");
        $sql->bindValue(":gendre", $customers->getGendre());
        $sql->bindValue(":nom", $customers->getNom());
        $sql->bindValue(":prenom", $customers->getPrenom());
        $sql->bindValue(":email", $customers->getEmail());
        $sql->bindValue(":telephone", $customers->getTelephone());
        $sql->bindValue(":adresse", $customers->getAdresse());
        $sql->bindValue(":ville", $customers->getVille());
        $sql->bindValue(":codePostal", $customers->getCodePostal());
        $sql->bindValue(":id", $customers->getIdCustomer());
        $sql->execute();
        return $sql->execute();
        

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function deleteCustomerById($id){
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("DELETE FROM customer WHERE idCustomer=:uneId "); 
        $sql->bindParam(":uneId", $id);
        $sql->execute();
        
        return $sql->execute();
        

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}




}
