<?php

class Descriptionsejour{

        private $idDescription;
        private $idSejour;
        private $titre;
        private $image;
        private $titreImage;
        private $texte;
        private $numOrdre;
       








        /**
         * Get the value of idDescription
         */ 
        public function getIdDescription()
        {
                return $this->idDescription;
        }

        /**
         * Set the value of idDescription
         *
         * @return  self
         */ 
        public function setIdDescription($idDescription)
        {
                $this->idDescription = $idDescription;

                return $this;
        }

        /**
         * Get the value of titre
         */ 
        public function getTitre()
        {
                return $this->titre;
        }

        /**
         * Set the value of titre
         *
         * @return  self
         */ 
        public function setTitre($titre)
        {
                $this->titre = $titre;

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
         *
         * @return  self
         */ 
        public function setImage($image)
        {
                $this->image = $image;

                return $this;
        }

        /**
         * Get the value of titreImage
         */ 
        public function getTitreImage()
        {
                return $this->titreImage;
        }

        /**
         * Set the value of titreImage
         *
         * @return  self
         */ 
        public function setTitreImage($titreImage)
        {
                $this->titreImage = $titreImage;

                return $this;
        }

        /**
         * Get the value of texte
         */ 
        public function getTexte()
        {
                return $this->texte;
        }

        /**
         * Set the value of texte
         *
         * @return  self
         */ 
        public function setTexte($texte)
        {
                $this->texte = $texte;

                return $this;
        }

        /**
         * Get the value of numOrdre
         */ 
        public function getNumOrdre()
        {
                return $this->numOrdre;
        }

        /**
         * Set the value of numOrdre
         *
         * @return  self
         */ 
        public function setNumOrdre($numOrdre)
        {
                $this->numOrdre = $numOrdre;

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