<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
date_default_timezone_set("Europe/Kiev");
include_once'BasicHttpAuth.php';

define('ACCOUNTS_FILE', 'db.json');

$auth = new BasicHttpAuth(
    sprintf("%s/%s", __DIR__, ACCOUNTS_FILE)
);

if (isset($_POST['logbtn'])) {
    $userLogin=$_POST['email'];
    $userPass=$_POST['pass'];

    if($userLogin != NULL and $userPass != NULL){
        $auth->log(
            $userLogin,
            $userPass,
        );
    }
    
}
if (isset($_POST['regbtn'])) {
    $userName=$_POST['name'];
    $userLogin=$_POST['email'];
    $userPass=$_POST['pass'];

    if($userLogin != NULL and $userPass != NULL){
        $auth->reg(
            $userLogin,
            password_hash($userPass, PASSWORD_BCRYPT)
        );
    header("Location: index.php");
    }
}
