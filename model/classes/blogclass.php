<?php

class Blog{

    private $idBlog;
    private $dateBlog;
    private $descriptionBlog;
    private $idCustomer;
    private $idSejour;


   


    /**
     * Get the value of idBlog
     */ 
    public function getIdBlog()
    {
        return $this->idBlog;
    }

    /**
     * Set the value of idBlog
     *
     * @return  self
     */ 
    public function setIdBlog($idBlog)
    {
        $this->idBlog = $idBlog;

        return $this;
    }

    /**
     * Get the value of dateBlog
     */ 
    public function getDateBlog()
    {
        return $this->dateBlog;
    }

    /**
     * Set the value of dateBlog
     *
     * @return  self
     */ 
    public function setDateBlog($dateBlog)
    {
        $this->dateBlog = $dateBlog;

        return $this;
    }

    /**
     * Get the value of descriptionBlog
     */ 
    public function getDescriptionBlog()
    {
        return $this->descriptionBlog;
    }

    /**
     * Set the value of descriptionBlog
     *
     * @return  self
     */ 
    public function setDescriptionBlog($descriptionBlog)
    {
        $this->descriptionBlog = $descriptionBlog;

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