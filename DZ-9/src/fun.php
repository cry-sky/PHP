<?php

function addList(){
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [
            'products' => [],
        ];
    }
}

function basket($arrKeys){
    (in_array($_GET['product_id'], $arrKeys)) ?
    $_SESSION['cart']['products'][$_GET['product_id']]++ :
    $_SESSION['cart']['products'][$_GET['product_id']] = 1;
}

function basketList($products){
    if (count($_SESSION['cart']) > 0) {
        $cardItems = [];
        foreach($_SESSION['cart']['products'] as $product_id => $qty) {
            $cardItems[] = (object)[
                'id' => $product_id,
                'qty' => $qty,
                'info' => (object)$products[$product_id],
            ];      
        }
        require_once 'views/card.view.php';
    }
}

function save($d){
    foreach($d as $id => $qty){
        $_SESSION['cart']['products'][$id]=$qty;
    }
}

function remove(){
    unset($_SESSION['cart']['products'][$_GET['removeId']]);
}

function removeAll(){
    $_SESSION['cart']['products']=[];
}

function addNew($products, $arrKeys){
    $randNum=rand(1, count($products));
    
    (in_array($randNum, $arrKeys)) ?
    $_SESSION['cart']['products'][$randNum]++ :
    $_SESSION['cart']['products'][$randNum] = 1;
}