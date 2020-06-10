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
function checkOutList($products){
    if (count($_SESSION['cart']) > 0) {
        $checkOut = [];
        foreach($_SESSION['cart']['products'] as $product_id => $qty) {
            $checkOut[] = (object)[
                'id' => $product_id,
                'qty' => $qty,
                'info' => (object)$products[$product_id],
            ];      
        }
        require_once 'checkOut.php';
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

function reg (){
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header('WWW-Authenticate: Basic realm="My Realm"');
        exit;
    } else {
        return $_SERVER['PHP_AUTH_USER'];
    }
}
function buy($products, $userList){
    $buyList = [];
    if (count($_SESSION['cart']) > 0) {
        foreach($_SESSION['cart']['products'] as $product_id => $qty) {
            $buyList[] = (object)[
                'qty' => $qty,
                'info' => (object)$products[$product_id],
            ];
        }     
    }
    $goods=array($_SERVER['PHP_AUTH_USER'] => array());
    $dateAsq = date("m.d.y G:i");
    $totalsum = 0;
foreach($buyList as $info) {
    $arr1[] = $info->info;
    foreach($arr1 as $user){
        $str=$user->name ."//".  $user->brand ."//".  $user->category ."//".  $user->color ."//". $user->price."$";
        $price=$user->price;
    }
    array_push($goods, $str);
    $qty="qty:". $info->qty;
    array_push($goods, $qty);
    $sum=$price*$info->qty."$"."\n";
    array_push($goods, $sum);
    $totalsum+=$price*$info->qty;

}
    $impdate =  $_SERVER['PHP_AUTH_USER'].' '.$dateAsq."\n". implode( "//", $goods )."Total sum ".$totalsum."$\n";
    file_put_contents($userList, "$impdate", FILE_APPEND | LOCK_EX); 
    $_SESSION['cart']['products']=[];
}