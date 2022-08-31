<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class RecettesSearch{

    /**
     * @var int|null
     * @Assert\Range(min=0.50, max=20)
     */
    private $maxPrice;

    /**
     * @var int|null
     * @Assert\Range(min=0.50, max=20)
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