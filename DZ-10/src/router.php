<?php
session_start();
// session_unset();

require_once 'products.php';
require_once 'fun.php';
require_once 'config.php';


if(isset($_GET['action'])) {

    if ($_GET['action'] === 'add') {  
        addList();
        basket($_SESSION['cart']['products']);
        header('Location: router.php?action=list');
        header('Location: index.php');
    }

    if ($_GET['action'] === 'list') {
        basketList($products);
    }

    if ($_GET['action'] === 'remove') {
        remove();
        header('Location: router.php?action=list');
    }

    if ($_GET['action'] === 'removeAll') {
        removeAll();
        header('Location: router.php?action=list');
    }

    if ($_GET['action'] === 'addNew') {
        addList();
        addNew($products, $arrKeys);
        header('Location: router.php?action=list');
    }

    if ($_GET['action'] === 'checkOut') {
        checkOutList($products);
    }
    if ($_GET['action'] === 'buy') {
        reg();
        buy($products, $userList);
        header('Location: index.php');
    }
}
if (isset($_POST['Save'])) {
    $data = array_combine ( $_POST['qty']['id'], $_POST['qty']['qty'] );
    save($data);
    header('Location: router.php?action=list');
}