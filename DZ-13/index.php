<?php

require_once 'BookProduct.php';
require_once 'CdProduct.php';
require_once 'ShopProductWriter.php';
require_once 'ColaProduct.php';
require_once 'ColaUp.php';


$book = new BookProduct(
    "PHP 7 for Begginers",
    "John", "Bridge",
    59.11,
    1121
); 
$cd = new CdProduct(
    "Dark Paradise",
    "Lana", "Del Ray",
    29.99,
    52
);
$cola = new ColaUp(
    "Cola",
    "Coka Cola", 
    29.99,
    99,
    0.5,
    "<a href=\"https://www.coca-cola.ua\">Additionally</a>"
);
echo "<body style=\" wigth:700px;padding:200px; \"></body>";
echo $book->getSummaryLine();
echo "<br>";
echo $cd->getSummaryLine();
echo "<br>";
echo $cola->getSummaryLine();
echo "<br>";
