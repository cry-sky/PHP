<?php
    $userDir="uploads/";
    $userDate=array();

    ini_set("memory_limit", "15M");
    ini_set("display_errors", "1");
    ini_set("log_errors", "1");
    date_default_timezone_set('Europe/Kiev');

    if(isset($_SERVER['PHP_AUTH_USER'])){
        $userName=$_SERVER['PHP_AUTH_USER'];
        $userPass=$_SERVER['PHP_AUTH_PW'];
        $cost = 5;
        $passHash=password_hash($_SERVER['PHP_AUTH_PW'], PASSWORD_BCRYPT, ["cost" => $cost]);
        $userDate[$userName]=$passHash;
    }else{
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Cancel';
        exit;
    }
print_r($userDate);


?>