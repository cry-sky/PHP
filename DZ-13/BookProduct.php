<?php

class BookProduct
{
    public $title;
    public $authorName;
    public $authorSurName;
    public $price;
    
    public $pagesNum;

    public function __construct(
        $title, $authorName, $authorSurName, $price, $pagesNum
    )
    {
        $this->title = $title;
        $this->authorName = $authorName;
        $this->authorSurName = $authorSurName;
        $this->price = $price;
        
        $this->pagesNum = $pagesNum;
    }

    public function getSummaryLine()
    {
        $summary = "&laquo;<b>{$this->title}</b>&raquo;";
        $summary .= ", <i>" . $this->getAuthor() . '</i>';
        $summary .= sprintf(', <small style="color:red;">Pages: %d</small>', $this->getNumberOfPages());
        
        return $summary;
    }

    public function getNumberOfPages()
    {
        return $this->pagesNum;
    }

    public function getAuthor()
    {
        return "{$this->authorName} {$this->authorSurName}";
    }

}
