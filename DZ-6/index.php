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
    background-color: dodgerblue;
    overflow: hidden;
}
.form{
    width: 40%;
    margin: 200px auto;
    transform: translateX(-20px);
    position: relative;
}
h2{
    color: #fff;
    font-family: Arial, Helvetica, sans-serif;
    text-align: center;
    transform: translateX(10px);
}
input[type="email"],
input[type="password"]{
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
    color: white;
    position: absolute;
    top: 30%;right: -100px;
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
    bottom: -20px;
    right: -10px;
    font-size: 18px;
    text-decoration: none;
    color: #fff;
}
</style>
<div class="form">
    <h2>Авторизація</h2>
    <form action="login.php" method="post">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="pass" placeholder="Password">
        <input type="submit" value="&#10148;">
    </form>
    <a href="reg.php">Тук тук</a>
</div>    
</body>
</html>