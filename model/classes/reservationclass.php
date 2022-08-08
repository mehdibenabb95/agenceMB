<?php
class Reservation
{

        
        private $idReservation;
        private $datecreation;
        private $datemodif;
        private $nbplaces;
        private $prix;
        private $idSejour;
        private $idCustomer;


        

     


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

        

        /**
         * Get the value of datecreation
         */ 
        public function getDatecreation()
        {
                return $this->datecreation;
        }

        /**
         * Set the value of datecreation
         *
         * @return  self
         */ 
        public function setDatecreation($datecreation)
        {
                $this->datecreation = $datecreation;

                return $this;
        }

        /**
         * Get the value of datemodif
         */ 
        public function getDatemodif()
        {
                return $this->datemodif;
        }

        /**
         * Set the value of datemodif
         *
         * @return  self
         */ 
        public function setDatemodif($datemodif)
        {
                $this->datemodif = $datemodif;

                return $this;
        }

        /**
         * Get the value of nbplaces
         */ 
        public function getNbplaces()
        {
                return $this->nbplaces;
        }

        /**
         * Set the value of nbplaces
         *
         * @return  self
         */ 
        public function setNbplaces($nbplaces)
        {
                $this->nbplaces = $nbplaces;

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
         *
         * @return  self
         */ 
        public function setPrix($prix)
        {
                $this->prix = $prix;

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
