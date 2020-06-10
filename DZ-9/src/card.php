<?php
session_start();
// session_unset();

require_once 'products.php';
require_once 'fun.php';

$arrKeys=array_keys($_SESSION['cart']['products']);

if ($_GET['action'] === 'add') {  
    addList();
    basket($arrKeys);
    header('Location: card.php?action=list');
    header('Location: index.php');
}
if ($_GET['action'] === 'list') {
    basketList($products);
}

if (isset($_POST['Save'])) {
    $data = array_combine ( $_POST['qty']['id'], $_POST['qty']['qty'] );
    save($data);
    header('Location: card.php?action=list');
}

if ($_GET['action'] === 'remove') {
    remove();
    header('Location: card.php?action=list');
}
if ($_GET['action'] === 'removeAll') {
    removeAll();
    header('Location: card.php?action=list');
}
if ($_GET['action'] === 'addNew') {
    addList();
    addNew($products, $arrKeys);
    header('Location: card.php?action=list');
}