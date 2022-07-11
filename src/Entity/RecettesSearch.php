<?php
namespace App\Entity;

class RecettesSearch{

    /**
     * @var int|null
     */
    private $maxPrice;

    /**
     * @var int|null
     */
    private $minPrice;

    

    /**
     * Get the value of maxPrice
     *
     * @return  int|null
     */ 
    public function getMaxPrice()
    {
        return $this->maxPrice;
    }

    /**
     * Set the value of maxPrice
     *
     * @param  int|null  $maxPrice
     *
     * @return  self
     */ 
    public function setMaxPrice($maxPrice)
    {
        $this->maxPrice = $maxPrice;

        return $this;
    }

    /**
     * Get the value of minPrice
     *
     * @return  int|null
     */ 
    public function getMinPrice()
    {
        return $this->minPrice;
    }

    /**
     * Set the value of minPrice
     *
     * @param  int|null  $minPrice
     *
     * @return  self
     */ 
    public function setMinPrice($minPrice)
    {
        $this->minPrice = $minPrice;

        return $this;
    }
}

?>