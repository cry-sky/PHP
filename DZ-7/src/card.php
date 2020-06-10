<?php
session_start();
// session_unset();
require_once 'products.php';
$qty=0;
if ($_GET['action'] === 'add') {
    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [
            'products' => [],
        ];
    }
    (in_array($_GET['product_id'], array_keys($_SESSION['cart']['products']))) ?
    $_SESSION['cart']['products'][$_GET['product_id']]++ :
    $_SESSION['cart']['products'][$_GET['product_id']] = 1;
    
    header('Location: card.php?action=list');
    header('Location: index.php');
}
if ($_GET['action'] === 'list') {
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

if (isset($_POST['Save'])) { 
    for($i=0;$i<count($_POST['qty']['id']);$i++){
        
        if($_POST['qty']['qty'][$i]<=0){
            $_POST['qty']['qty'][$i]=1;
        }

        $_SESSION['cart']['products'][$_POST['qty']['id'][$i]] = $_POST['qty']['qty'][$i];
        header('Location: card.php?action=list');
    }
}

if ($_GET['action'] === 'remove') {
    unset($_SESSION['cart']['products'][$_GET['removeId']]);
    header('Location: card.php?action=list');
}
if ($_GET['action'] === 'removeAll') {
    unset($_SESSION['cart']['products']);
    header('Location: card.php?action=list');
}
