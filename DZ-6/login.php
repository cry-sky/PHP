<?php

$userData=file_get_contents("data/userData.txt");
$expdata=explode('|',$userData);

// echo "<pre>";
// var_dump($expdata);

for($i=1;$i<count($expdata);$i+=3){
    $name=$expdata[$i-=1];
    $i++;
    $email=$expdata[$i];
    $i++;

    if($email===$_POST['email']){
        if(password_verify($_POST['pass'], $expdata[$i])){
            $cost = array('cost' => 11);
            $hash=$expdata[$i];
            $pass=$_POST['pass'];
            $file = "data\userData.txt";

            if (password_needs_rehash($hash, PASSWORD_DEFAULT, $cost)) {
                $newHash = password_hash($pass, PASSWORD_DEFAULT, $cost);
                $userData=array("$name|$email|$newHash|");
                $impdate=implode("",$userData);

                file_put_contents($file, "$impdate",  LOCK_EX);
            }
            header("Location: content.php");
        }else{
            echo 'Пароль невірний.';
        }
        break;
    }else{
        echo "Логін невірний";
    }
}
