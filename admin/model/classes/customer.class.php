<?php
class Customer{
    private $idCustomer;
    private $gendre;
    private $nom;
    private $prenom;
    private $email;
    private $mdp;  
    private $telephone;
    private $adresse;
    private $ville;
    private $codePostal;
    private $dateCreation;
    private $dateModif;
    /**
     * Get the value of idCustomer
     */ 
   

    /**
     * Get the value of gendre
     */
    public function getGendre()
    {
        return $this->gendre;
    }

    /**
     * Set the value of gendre
     */
    public function setGendre($gendre): self
    {
        $this->gendre = $gendre;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */
    public function setNom($nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     */
    public function setPrenom($prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of mdp
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set the value of mdp
     */
    public function setMdp($mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Get the value of adresse
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     */
    public function setAdresse($adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of telephone
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     */
    public function setTelephone($telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get the value of ville
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     */
    public function setVille($ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of codePostal
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set the value of codePostal
     */
    public function setCodePostal($codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get the value of dateCreation
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set the value of dateCreation
     */
    public function setDateCreation($dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get the value of dateModif
     */
    public function getDateModif()
    {
        return $this->dateModif;
    }

    /**
     * Set the value of dateModif
     */
    public function setDateModif($dateModif): self
    {
        $this->dateModif = $dateModif;

        return $this;
    }

    /**
     * Get the value of idCustomer
     */ 
    public function getIdCustomer()
    {
        return $this->idCustomer;
    }

    /**
     * Set the value of idCustomer
     *
     * @return  self
     */ 
    public function setIdCustomer($idCustomer)
    {
        $this->idCustomer = $idCustomer;

        return $this;
    }
}
?>