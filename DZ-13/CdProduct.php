<?php

class CdProduct
{
    public $title;
    public $authorName;
    public $authorSurName;
    public $price;
    
    public $playTime;

    public function __construct(
        $title, $authorName, $authorSurName, $price, $playTime
    )
    {
        $this->title = $title;
        $this->authorName = $authorName;
        $this->authorSurName = $authorSurName;
        $this->price = $price;
        
        $this->playTime = $playTime;
    }

    public function getSummaryLine()
    {
        $summary = "&laquo;<b>{$this->title}</b>&raquo;";
        $summary .= ", <i>" . $this->getAuthor() . '</i>';
        $summary .= sprintf(', <small style="color:green;">Playing Time: %d:00 min</small>', $this->getPlayTime());

        return $summary;
    }

    public function getPlayTime()
    {
        return $this->playTime;
    }

    public function getAuthor()
    {
        return "{$this->authorName} {$this->authorSurName}";
    }

}
