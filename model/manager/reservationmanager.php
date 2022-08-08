<?php
require_once('model/classes/reservationclass.php');
class ReservationManager
{

    private $lePDO;

    public function __construct($unPDO)
    {

        $this->lePDO = $unPDO;
    }


    public function creerReservation(Reservation $reservation)
    {

        try {
            $connex = $this->lePDO;
            
            $sql = $connex->prepare("INSERT INTO reservation ( nbplaces, prix, idCustomer, idSejour) VALUES ( :nbplaces, :prix,:idCustomer, :idSejour)");

            $sql->bindValue(':nbplaces', $reservation->getNbplaces());
            $sql->bindValue(':prix', $reservation->getPrix());
            $sql->bindValue(':idCustomer', $reservation->getIdCustomer());
            $sql->bindValue(':idSejour', $reservation->getIdSejour());

            $sql->execute();
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function getReservationById($idReservation)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM reservation WHERE idReservation =:uneId");
            $sql->bindParam(":uneId", $idReservation);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "Reservation");
            $resultat = ($sql->fetch());
            return $resultat;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }




    public function getReservationByIdCustomer( $idCustomer)
    {
        try {
            $connex = $this->lePDO;
            $sql = $connex->prepare("SELECT * FROM reservation WHERE idCustomer=:idCustomer");
            $sql->bindParam(":idCustomer", $idCustomer);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "Reservation");
            $resultat = ($sql->fetchAll());
            return $resultat;
        } catch (PDOException $error) {
            echo "Fichier : " . $error->getFile() . "<br>";
            echo "Ligne : " . $error->getLine() . "<br>";
            echo $error->getMessage()  . "<br>";
            echo "code error : " . $error->getCode() . "<br>";
            echo 'methode : getReservationByIdCustomer';
        }
     }

     public function updateReservation(Reservation $reservation){
        try {
            $connex=$this->lePDO;
            $sql =$connex->prepare("UPDATE reservation set nbplaces= :nbplaces, prix= :prix, idCustomer=:idCustomer,idSejour=:idSejour WHERE idReservation =:id ");
            $sql->bindValue(":nbplaces", $reservation->getNbplaces());
            $sql->bindValue(":prix", $reservation->getPrix());
            $sql->bindValue(":idCustomer", $reservation->getIdCustomer());
            $sql->bindValue(":idSejour", $reservation->getIdSejour());
            $sql->bindValue(":id", $reservation->getIdReservation());
            var_dump($reservation);
            $sql->execute();
            return $sql->execute();
            
    
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function deleteReservationById($id){
        try {
            $connex=$this->lePDO;
            $sql =$connex->prepare("DELETE FROM reservation WHERE iReservation=:uneId "); 
            $sql->bindParam(":uneId", $id);
            $sql->execute();
            
            return $sql->execute();
            
    
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
}
