<?php
 if (file_exists("../model/classes/customer.class.php"))
 require_once("../model/classes/customer.class.php");
else require_once("./model/classes/customer.class.php");
 
class CustomerManager{

    private $lePDO;

    public function __construct($unPDO){
        $this-> lePDO = $unPDO;
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

    


/* Une methode qui permet d'extraire tout les clients de la table customer de notre lePDO
@Return Un array d'objets  de la classe customer
*/
public function getAllCustomer(){
    try {

        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT * FROM customer ORDER BY idCustomer");
        $sql->execute();
        $resultat = ($sql->fetchAll(PDO::FETCH_CLASS, "Customer"));
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function getCustomerById($id)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT * FROM customer WHERE idCustomer=:uneId ");
        $sql->bindParam(":uneId", $id);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_CLASS,"Customer");
        $resultat = ($sql->fetch());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}


public function updateCustomer(Customer $unCustomer){
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("UPDATE customer set gendre= :gendre, nom= :nom, prenom=:prenom,email=:email, telephone= :telephone, adresse= :adresse, ville=:ville, codePostal=:codePostal,dateModif=NOW() WHERE idCustomer= :id ");
        $sql->bindValue(":gendre", $unCustomer->getGendre());
        $sql->bindValue(":nom", $unCustomer->getNom());
        $sql->bindValue(":prenom", $unCustomer->getPrenom());
        $sql->bindValue(":email", $unCustomer->getEmail());
        $sql->bindValue(":telephone", $unCustomer->getTelephone());
        $sql->bindValue(":adresse", $unCustomer->getAdresse());
        $sql->bindValue(":ville", $unCustomer->getVille());
        $sql->bindValue(":codePostal", $unCustomer->getCodePostal());
        $sql->bindValue(":id", $unCustomer->getIdCustomer());
        return $sql->execute();
        

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function addCustomer(Customer $unCustomer){
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("INSERT INTO  customer (gendre,nom,prenom,email,mdp,telephone,adresse,ville,codePostal,dateCreation,dateModif) 
VALUES(:gendre,:nom,:prenom,:email,:mdp,:telephone,:adresse,:ville,:codePostal,NOW(),NOW())");
        $sql->bindValue(":gendre", $unCustomer->getGendre());
        $sql->bindValue(":nom", $unCustomer->getNom());
        $sql->bindValue(":prenom", $unCustomer->getPrenom());
        $sql->bindValue(":email", $unCustomer->getEmail());
        $sql->bindValue(":mdp", $unCustomer->getmdp());
        $sql->bindValue(":telephone", $unCustomer->getTelephone());
        $sql->bindValue(":adresse", $unCustomer->getAdresse());
        $sql->bindValue(":ville", $unCustomer->getVille());
        $sql->bindValue(":codePostal", $unCustomer->getCodePostal());

        
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

public function getCustomerByEmailAndPassword($email,$mdp)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT * FROM customer WHERE email=:email and mdp=:mdp "); /* : pour eviter les injection sql*/
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
        $sql =$connex->prepare("SELECT * FROM customer WHERE email=:email"); /* : pour eviter les injection sql*/
        $sql->bindParam(":email", $email);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_CLASS,"Customer");
        $resultat = ($sql->fetch());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function getPreviousCustomer(Customer $unCustomer)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT MAX(c.idCustomer) FROM customer as c WHERE c.idCustomer < :id"); /* : pour eviter les injection sql*/
        $sql->bindValue(":id", $unCustomer->getIdCustomer());
        $sql->execute();
        $resultat = ($sql->fetchColumn());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function getNextCustomer(Customer $unCustomer)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT MIN(c.idCustomer) FROM customer as c WHERE c.idCustomer > :id"); /* : pour eviter les injection sql*/
        $sql->bindValue(":id", $unCustomer->getIdCustomer());
        $sql->execute();
        $resultat = ($sql->fetchColumn());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

function getLastWeekCustomer() {
    $array = [];

    for ($i=-7; $i < 0 ; $i++ ) {
        $date = strtotime( $i . " days");
        $date_format = date('Y-m-d' ,$date);
        try {
            $connex=$this->lePDO;
            $sql =$connex->prepare("SELECT COUNT(*) FROM customer WHERE CAST(dateCreation AS DATE)=:date_creation ");
            $sql->bindParam(":date_creation", $date_format);
            $sql->execute();
            $resultat = ($sql->fetchColumn());
            $array[$date] = $resultat;
            
        } catch (PDOException $error) {
            echo $error->getMessage();
        }        
    }
    return $array;
 }

public function sendResetMail(Customer $customer)
{
    try {
        $connex=$this->lePDO;
        $token = uniqid(md5(time())); //this is a random token.
        $sql =$connex->prepare("INSERT INTO  init_password(email,token) VALUES(:email,:token)");
     
        $sql->bindValue(":email", $customer->getEmail());
        $sql->bindValue(":token", $token);
        if($sql->execute()){
            $from = "<info@example.com>";
            $to = $customer->getEmail();
            $subject = "Votre demande de nouveau mot de passe";
            // Create email headers
            $headers = "From: " . $from . "\r\n";
            $headers .= "Reply-To: ". $from . "\r\n";
            //$headers .= "CC: contact@exher.fr\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();
            $id = $customer->getIdCustomer();
            $customername = $customer->getNom() . ' ' . $customer->getPrenom();
            $button_link = '<a href="http://localhost/projet-agence/admin/newpassword.php?id=' . $id .'&token=' . $token .'" target="_blank" style="display: inline-block; padding: 10px 10px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 3px;">Confirmer ma demande</a>';
            $copy_link = '<a href="http://localhost/projet-agence/admin/newpassword.php?id=' . $id .'&token=' . $token .'" target="_blank">http://localhost/projet-agence/admin/newpassword.php?id=' . $id .'&token=' . $token . '</a>';
  
            $message = file_get_contents('templates/reset.html');
            $message = str_replace("{{name}}",$customername,$message);
            $message = str_replace("{{link1}}",$button_link,$message);
            $message = str_replace("{{link2}}",$copy_link,$message);
  
            $resultat = mail($to, $subject, $message, $headers);
            return $resultat;
        }
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}



}
