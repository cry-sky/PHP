<?php
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $topic=$_POST['topic'];
        $email=$_POST['email'];
        $message=$_POST['message'];
        $mail='mail.txt';
        if (preg_match("/@/", $email)) {
            echo "Email : true" . "</br>";
        }
        else {
            echo "Email : false" . "</br>";
        }
        if(empty($name and $topic and $email and $message)){
            readfile('contact.html');
            if(empty($name)){
                echo "Name : empty" . "</br>";
            }
            if(empty($topic)){
                echo "Topic : empty" . "</br>";
            }
            if(empty($email)){
                echo "Email : empty" . "</br>";
            }
            if(empty($message)){
                echo "Message : empty" . "</br>";
            }
        }
        
    }

    // mail('tratata1111@mail.ua', "$topic", $message);
    file_put_contents($mail, "$name : $topic : $email\r $message\n\r", FILE_APPEND | LOCK_EX);
?>