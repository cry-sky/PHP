<?php

class ColaProduct
{
    public $title;
    public $brand;
    public $price;

    public function __construct($title, $brand, $price)
    {
        $this->title = $title;
        $this->brand = $brand;
        $this->price = $price;
    }
    
    public function getSummaryLine()
    {
        $exit = "<i  style=\"font-size:20px; \">&laquo;<b>{$this->title}</b>&raquo;</i>";
        $exit .= ", <i style=\"font-size:18px; \"><strong>" . $this->brand . '</strong></i>';
        $exit .= ", <i style=\"font-size:18px; color:green;\"><strong>" . $this->price ."$"." ". '</strong></i>';

        return $exit;
    }
}