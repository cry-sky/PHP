<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
body{
    background-color: rgb(255, 255, 0);
    overflow: hidden;
}
.form{
    width: 40%;
    margin: 200px auto;
    transform: translateX(-20px);
    position: relative;
}
h2{
    color: #000;
    font-family: Arial, Helvetica, sans-serif;
    text-align: center;
    transform: translateX(10px);
}
input[type="email"],
input[type="password"],
input[type="text"]{
    width: 100%;
    height: 30px;
    margin-bottom: 15px;
    font-size: 18px;
    padding-left: 10px;
    border: transparent solid 1px;
    box-shadow: inset 2px 1px 5px rgba(0, 0, 0,.5);
    text-align: center;
}
input[type="submit"]{
    background-color:transparent;
    border: transparent solid 1px;
    font-size: 60px;
    color: #000;
    position: absolute;
    top: 35%;right: -100px;
    text-shadow: 2px 2px 3px rgba(0, 0, 0,.3);
    transform: scale(1);
    transition: .1s;
}
input[type="submit"]:hover{
    text-shadow: none;
    transform: scale(0.9);
}
a{
    position: absolute;
    bottom: -10%;
    left: 0;
    font-size: 25px;
    text-decoration: none;
    color: #000;
}
</style>
</php>
<div class="form">
    <h2>Хто там?</h2>
    <form action="log.php" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="pass" placeholder="Password">
        <input type="submit" name="regbtn" value="&#10148;">
    </form>
    <a href="index.php">&larr;</a>
</div>

</body>
</html>