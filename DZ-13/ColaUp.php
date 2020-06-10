<?php

class ColaUp extends ColaProduct
{
    public $calories;
    public $capacity;
    public $additionally;

    public function __construct($title, $brand, $price, $calories, $capacity, $additionally)
    {
        parent::__construct($title, $brand, $price);
       
        $this->calories = $calories;
        $this->capacity = $capacity;
        $this->additionally = $additionally;
    }

    public function getCalories()
    {
        return $this->calories;
    }   
    
    public function getCapacity()
    {
        return $this->capacity;
    }

    public function getAdditionally()
    {
        return $this->additionally;
    }

    public function getSummaryLine()
    {
        $exit= parent::getSummaryLine();
        $exit .= "<i  style=\"font-size:20px; \"><b>$this->calories calories</b></i>";
        $exit .= ", <i style=\"font-size:18px; \"><strong>" . $this->capacity . " liter".'</strong></i>';
        $exit .= ", <i style=\"font-size:18px; \"><strong>" . $this->additionally . '</strong></i>';

        return $exit;
    }
}