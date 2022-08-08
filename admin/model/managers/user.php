<?php
require("../model/classes/user.class.php");
 
 
class AdminManager{

    private $lePDO;

    public function __construct($unPDO){
        $this-> lePDO=$unPDO;
    }

   


/* Une methode qui permet d'extraire tout les utilisateurs de la table user de notre lePDO
@Return Un array d'objets  de la classe user
*/
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

public function getAdminById($id)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT * FROM admin WHERE idAdmin=:uneId ");
        $sql->bindParam(":uneId", $id);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_CLASS,"Admin");
        $resultat = ($sql->fetch());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}


public function updateAdmin(Admin $unAdmin){
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("UPDATE admin set nom= :nom, prenom=:prenom,email=:email WHERE idAdmin=:id ");
        $sql->bindValue(":nom", $unAdmin->getNom());
        $sql->bindValue(":prenom", $unAdmin->getPrenom());
        $sql->bindValue(":email", $unAdmin->getEmail());
        $sql->bindValue(":id", $unAdmin->getIdAdmin());
        $sql->execute();
        return true;
        

    } catch (PDOException $error) {
        echo $error->getMessage();
        
    }
}

public function updatePassword(Admin $unAdmin){
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("UPDATE admin set mdp= :mdp WHERE id=:id ");
        $sql->bindValue(":mdp", $unAdmin->getMdp());
        $sql->bindValue(":id", $unAdmin->getIdAdmin());
        $sql->execute();
        

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function addAdmin(Admin $unAdmin){
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("INSERT INTO  admin (nom, prenom,email,mdp) VALUES(:nom, :prenom,:email,:mdp)");
     
        $sql->bindValue(":nom", $unAdmin->getNom());
        $sql->bindValue(":prenom", $unAdmin->getPrenom());
        $sql->bindValue(":email", $unAdmin->getEmail());
        // $sql->bindValue(":id", $unAdmin->getIdAdmin());
        $sql->bindValue(":mdp", $unAdmin->getmdp());
        $sql->execute();
        return true;
        

    } catch (PDOException $error) {
        echo $error->getMessage();
        return false;
    }
}

public function deleteAdminById($id){
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("DELETE FROM admin WHERE idAdmin=:uneId ");        
        $sql->bindParam(":uneId", $id);
        $sql->execute();
        
        $sql->execute();
        return true;
        

    } catch (PDOException $error) {
        echo $error->getMessage();
        return false;
    }
}

public function getAdminByEmailAndPassword($email,$mdp)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT * FROM admin WHERE email=:email and mdp=:mdp "); /* : pour eviter les injection sql*/
        $sql->bindParam(":email", $email);
        $sql->bindParam(":mdp", $mdp);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_CLASS,"Admin");
        $resultat = ($sql->fetch());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function getAdminByEmail($email)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT * FROM admin WHERE email=:email"); /* : pour eviter les injection sql*/
        $sql->bindParam(":email", $email);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_CLASS,"Admin");
        $resultat = ($sql->fetch());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}


public function getPreviousAdmin(Admin $unAdmin)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT MAX(c.idAdmin) FROM admin  as c WHERE c.idAdmin < :id"); /* : pour eviter les injection sql*/
        $sql->bindValue(":id", $unAdmin->getIdAdmin());
        $sql->execute();
        $resultat = ($sql->fetchColumn());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function getNextAdmin(Admin $unAdmin)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT MIN(c.idAdmin) FROM admin as c WHERE c.idAdmin > :id"); /* : pour eviter les injection sql*/
        $sql->bindValue(":id", $unAdmin->getIdAdmin());
        $sql->execute();
        $resultat = ($sql->fetchColumn());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function sendResetMail(Admin $Admin)
{
    try {
        $connex=$this->lePDO;
        $token = uniqid(md5(time())); //this is a random token.
        $this->deleteToken($Admin); //delete token if exist
        $sql =$connex->prepare("INSERT INTO  init_password(email,token) VALUES(:email,:token)");
     
        $sql->bindValue(":email", $Admin->getEmail());
        $sql->bindValue(":token", $token);
        if($sql->execute()){
            $from = "<info@example.com>";
            $to = $Admin->getEmail();
            $subject = "Votre demande de nouveau mot de passe";
            // Create email headers
            $headers = "From: " . $from . "\r\n";
            $headers .= "Reply-To: ". $from . "\r\n";
            //$headers .= "CC: contact@exher.fr\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();
            $id = $Admin->getIdAdmin();
            $username = $Admin->getNom() . ' ' . $Admin->getPrenom();
            $button_link = '<a href="http://localhost/projet-agence/admin/new-password.php?id=' . $id .'&token=' . $token .'" target="_blank" style="display: inline-block; padding: 10px 10px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 3px;">Confirmer ma demande</a>';
            $copy_link = '<a href="http://localhost/projet-agence/admin/new-password.php?id=' . $id .'&token=' . $token .'" target="_blank">http://localhost/projet-agence/admin/newpassword.php?id=' . $id .'&token=' . $token . '</a>';
  
            $message = file_get_contents('templates/reset.html');
            $message = str_replace("{{name}}",$username,$message);
            $message = str_replace("{{link1}}",$button_link,$message);
            $message = str_replace("{{link2}}",$copy_link,$message);
  
            $resultat = mail($to, $subject, $message, $headers);
            return $resultat;
        }
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function getToken(Admin $unAdmin){
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT token FROM init_password WHERE email=:email "); /* : pour eviter les injection sql*/
        $sql->bindValue(":email", $unAdmin->getEmail());
        $sql->execute();
        $resultat = ($sql->fetchColumn());
        return $resultat;
        

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function deleteToken(Admin $unAdmin){
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("DELETE FROM init_password WHERE email=:email "); /* : pour eviter les injection sql*/
        $sql->bindValue(":email", $unAdmin->getEmail());
        $sql->execute();
        

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

}

?>