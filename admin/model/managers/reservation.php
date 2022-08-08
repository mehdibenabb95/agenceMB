<?php
if (file_exists("../model/classes/reservation.class.php"))
    require_once("../model/classes/reservation.class.php");
else require_once("./model/classes/reservation.class.php");

 
class ReservationManager{

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


/* Une methode qui permet d'extraire tout les réservation de la table reservation de notre lePDO
@Return Un array d'objets  de la classe reservation
*/
public function getAllReservation(){

    try {
       
        

        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT * FROM reservation ORDER BY idReservation");
        $sql->execute();
        $resultat = ($sql->fetchAll(PDO::FETCH_CLASS, "Reservation"));
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function getReservationById($id)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT * FROM reservation WHERE idReservation=:uneId ");
        $sql->bindParam(":uneId", $id);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_CLASS,"Reservation");
        $resultat = ($sql->fetch());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function getUnreadReservation()
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT * FROM reservation ORDER BY idReservation DESC LIMIT 5");
        $sql->execute();
        $resultat = ($sql->fetchAll(PDO::FETCH_CLASS, "Reservation"));
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function getCountUnreadReservation()
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT COUNT(*) FROM reservation WHERE read_flag=0");
        $sql->execute();
        $resultat = ($sql->fetchColumn());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}


public function updateReservation(Reservation $unReservation){
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("UPDATE reservation set code=:code, fk_customer=:fk_customer,fk_sejour=:fk_sejour,date_modif=NOW(),nb_places=:nb_places,prix=:prix,status=:status WHERE idReservation=:id ");
        $sql->bindValue(":code", $unReservation->getCode());
        $sql->bindValue(":fk_customer", $unReservation->getFkCustomer());
        $sql->bindValue(":fk_sejour", $unReservation->getFkSejour());
        $sql->bindValue(":nb_places", $unReservation->getNbPlaces());
        $sql->bindValue(":prix", $unReservation->getPrix());
        $sql->bindValue(":status", $unReservation->getStatus());
        $sql->bindValue(":id", $unReservation->getIdReservation());
        return $sql->execute();
        

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function updateAllReservationReadFlag(){
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("UPDATE reservation set read_flag=1 WHERE read_flag=0 ");
        $sql->execute();
        

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function addReservation(Reservation $uneReservation){
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("INSERT INTO  reservation (code,fk_customer,fk_sejour,date_creation,nb_places,prix,status) VALUES(:code,:fk_customer,:fk_sejour,NOW(),:nb_places,:prix,:status)");
     
        $sql->bindValue(":code", $uneReservation->getCode());
        $sql->bindValue(":fk_customer", $uneReservation->getFkCustomer());
        $sql->bindValue(":fk_sejour", $uneReservation->getFkSejour());
        $sql->bindValue(":nb_places", $uneReservation->getNbPlaces());
        $sql->bindValue(":prix", $uneReservation->getPrix());
        $sql->bindValue(":status", $uneReservation->getStatus());
        return $sql->execute();
        

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function deleteReservationById($id){
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("DELETE FROM reservation WHERE idReservation=:uneId ");        
        $sql->bindParam(":uneId", $id);
        return $sql->execute();
        

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function getReservationByStatus($status)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT * FROM reservation WHERE status=:unStatus ");
        $sql->bindParam(":unStatus", $status);
        $sql->execute();
        $resultat = ($sql->fetchAll(PDO::FETCH_CLASS, "Reservation"));
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function getReservationByKeyword($keyword)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT r.* FROM Reservation r INNER JOIN customer c ON r.fk_customer = c.id INNER JOIN sejour s ON r.fk_sejour = s.id WHERE c.nom LIKE :keyword OR c.prenom Like :keyword OR s.code LIKE :keyword OR s.villeDestination Like :keyword " );
        $keyword = "%" . $keyword . "%";
        $sql->bindParam(":keyword", $keyword);
        $sql->execute();
        $resultat = ($sql->fetchAll(PDO::FETCH_CLASS, "Reservation"));
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function getNextCode()
{
    $prefix = "RES";
    $max = 0;
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT MAX(CAST(id AS SIGNED)) as max FROM reservation");
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



public function getPreviousReservation(Reservation $unReservation)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT MAX(r.idReservation) FROM reservation as r WHERE r.idReservation < :id"); /* : pour eviter les injection sql*/
        $sql->bindValue(":id", $unReservation->getIdReservation());
        $sql->execute();
        $resultat = ($sql->fetchColumn());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

public function getNextReservation(Reservation $unReservation)
{
    try {
        $connex=$this->lePDO;
        $sql =$connex->prepare("SELECT MIN(r.idReservation) FROM reservation as r WHERE r.idReservation > :id"); /* : pour eviter les injection sql*/
        $sql->bindValue(":id", $unReservation->getIdReservation());
        $sql->execute();
        $resultat = ($sql->fetchColumn());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

    public function getDuration(Reservation $unReservation)
    {
        date_default_timezone_set('Europe/Paris');


        $date1 = new DateTime("NOW");
        $date2 = new DateTime($unReservation->getDateCreation());
        $interval = $date1->diff($date2);
        $output = "";
        if ($interval->y != 0) {
            $output .= $interval->y . " année(s) ";
        } else {
            if ($interval->m != 0) {
                $output .= $interval->m . " mois ";
            } else {
                if ($interval->d != 0) {
                    $output .= $interval->d . " jour(s), ";
                } else {
                    if ($interval->h != 0) {
                        $output .= $interval->h . "h, ";
                        if ($interval->i != 0) {
                            $output .= $interval->i . "m";
                        }
                    } else {
                        if ($interval->i != 0) {
                            $output .= $interval->i . "m, ";
                            if ($interval->s != 0)
                                $output .=  $interval->s . "s";
                        } else {
                            $output .= $interval->s . "s";
                        }
                    }
                }
            }
        }
        return $output;
     }

     function getLastWeekReservation() {
        $array = array();

        for ($i=-7; $i < 0 ; $i++ ) {
            $date = strtotime( $i . " days");
            $date_format = date('Y-m-d' ,$date);
            try {
                $connex=$this->lePDO;
                $sql =$connex->prepare("SELECT COUNT(*) FROM reservation WHERE CAST(date_creation AS DATE)=:date_creation ");
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


   
}

?>