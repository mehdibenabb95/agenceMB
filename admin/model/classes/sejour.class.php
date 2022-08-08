<?php
class Sejour{
    private $idSejour;
    private $code;
    private $villeDepart;
    private $villeDestination;
    private $dateDepart;
    private $dateArrivee;
    private $placeTotal;
    private $placeLibre;
    private $prix;
    private $description;
    private $image;
    

    
    /**
     * Get the value of code$code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code$code
     */
    public function setCode($code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of villeDepart
     */
    public function getVilleDepart()
    {
        return $this->villeDepart;
    }

    /**
     * Set the value of villeDepart
     */
    public function setVilleDepart($villeDepart): self
    {
        $this->villeDepart = $villeDepart;

        return $this;
    }

    /**
     * Get the value of villeDestination
     */
    public function getVilleDestination()
    {
        return $this->villeDestination;
    }

    /**
     * Set the value of villeDestination
     */
    public function setVilleDestination($villeDestination): self
    {
        $this->villeDestination = $villeDestination;

        return $this;
    }

    /**
     * Get the value of dateDepart
     */
    public function getDateDepart()
    {
        return $this->dateDepart;
    }

    /**
     * Set the value of dateDepart
     */
    public function setDateDepart($dateDepart): self
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    /**
     * Get the value of dateArrivee
     */
    public function getDateArrivee()
    {
        return $this->dateArrivee;
    }

    /**
     * Set the value of dateArrivee
     */
    public function setDateArrivee($dateArrivee): self
    {
        $this->dateArrivee = $dateArrivee;

        return $this;
    }

    /**
     * Get the value of placeTotal
     */
    public function getPlaceTotal()
    {
        return $this->placeTotal;
    }

    /**
     * Set the value of placeTotal
     */
    public function setPlaceTotal($placeTotal): self
    {
        $this->placeTotal = $placeTotal;

        return $this;
    }

    /**
     * Get the value of placeLibre
     */
    public function getPlaceLibre()
    {
        return $this->placeLibre;
    }

    /**
     * Set the value of placeLibre
     */
    public function setPlaceLibre($placeLibre): self
    {
        $this->placeLibre = $placeLibre;

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
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     */
    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of idSejour
     */ 
    public function getIdSejour()
    {
        return $this->idSejour;
    }

    /**
     * Set the value of idSejour
     *
     * @return  self
     */ 
    public function setIdSejour($idSejour)
    {
        $this->idSejour = $idSejour;

        return $this;
    }
}


    
?>