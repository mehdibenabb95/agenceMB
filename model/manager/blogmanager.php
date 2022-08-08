<?php
ini_set ('display_errors','on');
require ('model/classes/blogclass.php');
?>

<?php
class BlogManager{

    private $lePDO;
public function __construct($unPDO)
{
    $this->lePDO = $unPDO;
}   
 public function creerBlog(Blog $blog)
{
    try{

        $connex = $this -> lePDO;
        $sql = $connex -> prepare("INSERT INTO blog ( descriptionBlog,idCustomer,idSejour ) 
        VALUES ( :descriptionBlog, :idCustomer, :idSejour )");
        
        $sql->bindValue(":descriptionBlog",$blog->getDescriptionBlog());
        $sql->bindValue(":idCustomer",$blog->getIdCustomer());
        $sql->bindValue(":idSejour",$blog->getIdSejour());
        $sql->execute();


        }catch (PDOException $error){
           echo $error -> getMessage();
        }

        }

 public function getAllBlog()
 { 
     try{     
        
        $connex = $this -> lePDO;
        $sql = $connex-> prepare("SELECT * FROM blog");
        $sql -> execute();
        $resultat = ($sql -> fetchAll(PDO::FETCH_CLASS, "Blog"));
        return $resultat;

 
}catch (PDOException $error){
    echo $error -> getMessage();
}
 
 }

 public function getBlogById($idBlog)
 {
     try {
         $connex = $this->lePDO;
         $sql = $connex->prepare("SELECT * FROM blog WHERE idBlog =:uneId");
         $sql->bindParam(":uneId", $idBlog);
         $sql->execute();
         $sql->setFetchMode(PDO::FETCH_CLASS, "Reservation");
         $resultat = ($sql->fetch());
         return $resultat;
     } catch (PDOException $error) {
         echo $error->getMessage();
     }
 }
 
 public function deleteBlogById($id){
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("DELETE FROM  blog WHERE idBlog=:uneId "); 
        $sql->bindParam(":uneId", $id);
        $sql->execute();
        
        return $sql->execute();
        

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}
}

?>















