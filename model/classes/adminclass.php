<?php
 class Admin{
     private $idAdmin;
     private $nom;
     private $prenom;
     private $email;
     private $mdp;
 
     public function getIdAdmin()
     {
          return $this->idAdmin;
     }

     /**
      * Set the value of idAdmin
      *
      * @return  self
      */ 
     public function setIdAdmin($idAdmin)
     {
          $this->idAdmin = $idAdmin;

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
      *
      * @return  self
      */ 
     public function setNom($nom)
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
      *
      * @return  self
      */ 
     public function setPrenom($prenom)
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
      *
      * @return  self
      */ 
     public function setEmail($email)
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
      *
      * @return  self
      */ 
     public function setMdp($mdp)
     {
          $this->mdp = $mdp;

          return $this;
     }
 }

?>