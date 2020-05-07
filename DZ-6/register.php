<?php
if($_POST["name"] != "" or $_POST["email"] != "" or $_POST["pass"] != "" ){
    $name = $_POST["name"];
    $file = "data\userData.txt";  

    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if (!$email) {
        echo "Wrong user email";
    }

    $password = filter_var($_POST['pass'], FILTER_DEFAULT);
    if(empty($password) || mb_strlen($password) < 10) {
    echo "Wrong or empty user password";
    }

    $passHash = password_hash($password, PASSWORD_DEFAULT);
    $userData=array("$name|$email|$passHash|");
    $impdate=implode("",$userData);

    file_put_contents($file, "$impdate", FILE_APPEND | LOCK_EX);
}
header("HTTP/1.1 302 Redirect");
header("Location: index.php");

