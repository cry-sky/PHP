<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div style="width: 500px;margin: 0 auto;">
    <h2>ДЗ-1</h2>
    <hr style="margin: 20px 0;">
    <form action="index.php" method="post">
        <input type="number" name="year" id="year" step="1">
        <select name="month" id="month" class="form-control">
            <option value="1">Січень</option>
            <option value="2">Лютий</option>
            <option value="3">Березень</option>
            <option value="4">Квітень</option>
            <option value="5">Травень</option>
            <option value="6">Червень</option>
            <option value="7">Липень</option>
            <option value="8">Серпень</option>
            <option value="9">Вересень</option>
            <option value="10">Жовтень</option>
            <option value="11">Листопад</option>
            <option value="12">Грудень</option>
        </select>
        <button type="submit" name="submit" value="submit">Підрахувати</button>
    </form>
<?php
if(isset($_POST['submit'])){

    $year=$_POST['year'];
    if($year==null){
        $year=date("Y");
    }
    $isLeapYear = ($year % 4) || (($year % 100 === 0) && ($year % 400)) ? 0 : 1;
    if ($isLeapYear===0){
        echo "Рік " . $year . " не є високостним" . "</br>";
    }else{
        echo "Рік " . $year . " є високостним" . "</br>";
    }
    $month=$_POST['month'];
    $daysInMonth = 31 - (($month == 2) ? (3 - $isLeapYear) : (($month - 1) % 7 % 2));
    $monthName='';
        if($month == 1) {$monthName='Січні';}
        if($month == 2) {$monthName='Лютому';}
        if($month == 3) {$monthName='Березені';}
        if($month == 4) {$monthName='Квітні';}
        if($month == 5) {$monthName='Травні';}
        if($month == 6) {$monthName='Червні';}
        if($month == 7) {$monthName='Липні';}
        if($month == 8) {$monthName='Серпні';}
        if($month == 9) {$monthName='Вересні';}
        if($month == 10) {$monthName='Жовтні';}
        if($month == 11) {$monthName='Листопаді';}
        if($month == 12) {$monthName='Грудні';}      
    echo "В " . " $monthName" . " $daysInMonth" .  " днів";
}
?>

    <hr style="margin: 20px 0;">
    <h2>ДЗ-2</h2>
    <hr style="margin: 20px 0;">
    <form action="index.php" method="post">
    <input type="text" name="plndrm">
    <button type="submit" name="plndrmbtn" value="plndrmbtn">паліндром?</button>
    </form>

    <?php
    if(isset($_POST['plndrmbtn'])){
    $str=$_POST['plndrm'];
    $str2= strrev($str);
    echo ($str===$str2) ? " Так " : " Ні ";
    }
    
    ?>

    <hr style="margin: 20px 0;">
    <h2>ДЗ-3</h2>
    <hr style="margin: 20px 0;">
    <form action="index.php" method="post">
    <input type="text" name="usertext" style="width: 85%;">
    <button type="submit" name="textfiltr" value="textfiltr">Фільтр</button>
    </form>

    <?php
    $filtr=array('a','e','i','u','o');
    $ut=str_split($_POST['usertext'],1);
    if(isset($_POST['textfiltr'])){
        foreach(array_intersect($ut, $filtr) as $key => &$value){
            echo $value . " ";
        }
    }
    ?>
</div>
</body>
</html>