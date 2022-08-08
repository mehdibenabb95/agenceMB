<?php
class Reservation
{
    private $idReservation;
    private $code;
    private $fk_customer;
    private $fk_sejour;
    private $date_creation;
    private $date_modif;
    private $nb_places;
    private $prix;
    private $status;
    private $read_flag;

   

    /**
     * Get the value of code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     */
    public function setCode($code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of fk_customer
     */
    public function getFkCustomer()
    {
        return $this->fk_customer;
    }

    /**
     * Set the value of fk_customer
     */
    public function setFkCustomer($fk_customer): self
    {
        $this->fk_customer = $fk_customer;

        return $this;
    }

    /**
     * Get the value of fk_sejour
     */
    public function getFkSejour()
    {
        return $this->fk_sejour;
    }

    /**
     * Set the value of fk_sejour
     */
    public function setFkSejour($fk_sejour): self
    {
        $this->fk_sejour = $fk_sejour;

        return $this;
    }

    /**
     * Get the value of date_creation
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * Set the value of date_creation
     */
    public function setDateCreation($date_creation): self
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    /**
     * Get the value of date_modif
     */
    public function getDateModif()
    {
        return $this->date_modif;
    }

    /**
     * Set the value of date_modif
     */
    public function setDateModif($date_modif): self
    {
        $this->date_modif = $date_modif;

        return $this;
    }

    /**
     * Get the value of nb_places
     */
    public function getNbPlaces()
    {
        return $this->nb_places;
    }

    /**
     * Set the value of nb_places
     */
    public function setNbPlaces($nb_places): self
    {
        $this->nb_places = $nb_places;

        return $this;
    }

    /**
     * Get the value of prix
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     */
    public function setPrix($prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus($status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of read_flag
     */
    public function getReadFlag()
    {
        return $this->read_flag;
    }

    /**
     * Set the value of read_flag
     */
    public function setReadFlag($read_flag): self
    {
        $this->read_flag = $read_flag;

        return $this;
    }

        /**
     * Get the value of status
     */
    public function getHtmlStatus()
    {
        $string = "";
        switch ($this->status) {
            case 1:
                $string = '<span class="badge bg-success">Payée</span>';
                break;
            case 2:
                $string = '<span class="badge bg-warning">En attente</span>';
                break;
            case 3:
                $string = '<span class="badge bg-danger">Annulée</span>';
                break;         

        }
        return $string;
    }



    /**
     * Get the value of idReservation
     */ 
    public function getIdReservation()
    {
        return $this->idReservation;
    }

    /**
     * Set the value of idReservation
     *
     * @return  self
     */ 
    public function setIdReservation($idReservation)
    {
        $this->idReservation = $idReservation;

        return $this;
    }
}
    
?>