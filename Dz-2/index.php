<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="width: 1000px;margin: 0 auto;">
        <h2 style="text-align: center;">ДЗ-1</h2>
        <hr style="margin: 20px 0;">
        <?php
        $board='';
        for($i=1;$i<=8;$i++){
            $board .= '<tr>';
            for($j=1;$j<=8;$j++){
                $color=($i+$j) % 2 ? '#fff' : '#000';
            $board.="<td style='width:30px;height:30px;background-color:$color'></td>";
            }
            $board .= '</tr>';
        }
        echo "<table style='margin:10px auto;border:solid 1px #000;'>{$board}</table>";
        ?>
        <hr style="margin: 20px 0;">
        <h2 style="text-align: center;">ДЗ-2</h2>
        <hr style="margin: 20px 0;">
        <?php
        $board='';
        for($i=1;$i<=10;$i++){
            $board .= '<tr>';
            for($j=1;$j<=10;$j++){
                $num=$i*$j;
            $board.="<td style='border:solid 1px silver;text-align:center;'>{$num}</td>";
            }
            $board .= '</tr>';
        }
        echo "<table style='margin:10px auto;border:solid 1px gray;'>{$board}</table>";
        ?>
         <hr style="margin: 20px 0;">
        <h2 style="text-align: center;">ДЗ-3</h2>
        <hr style="margin: 20px 0;">
        <?php
        $board='';
        for($i=1;$i<=6;$i++){
            $board .= '<tr>';
            for($j=1;$j<=5;$j++){
                $num=$i*$j;
            $board.="<td style='border:solid 1px silver;text-align:center;'>{$i} * {$j} = {$num}</td>";
            }
            $board .= '</tr>';
        }
        echo "<table style='margin:10px auto;border:solid 1px gray;'>{$board}</table>";
        ?>
        <hr style="margin: 20px 0;">
        <h2 style="text-align: center;">ДЗ-4</h2>
        <hr style="margin: 20px 0;">
        <div style="width: 300px;margin:0 auto;">
            <?php
            $arr = array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg",
            "Belgium"=> "Brussels", "Denmark"=>"Copenhagen",
            "Finland"=>"Helsinki", "France" => "Paris",
            "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" =>
            "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin",
            "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon",
            "Spain"=>"Madrid", "Sweden"=>"Stockholm", "United
            Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius",
            "Czech Republic"=>"Prague", "Estonia"=>"Tallinn",
            "Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valletta",
            "Austria" => "Vienna", "Poland"=>"Warsaw");
            asort($arr);
            foreach($arr as $country => $capital){
            echo "The capital of $country is $capital"."<br>";
            };
            ?>
        </div>
        <hr style="margin: 20px 0;">
        <h2 style="text-align: center;">ДЗ-5</h2>
        <hr style="margin: 20px 0;">
        <div>
            <?php
            $nums = array(78, 60, 62, 68, 71, 68,73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74,62, 62, 65, 64, 68, 73, 75, 79, 73);
            $sum = 0;
            foreach($nums as $num){
                $sum += $num;
            }
            echo "Average Temperature is : " . $sum/count($nums)."</br>";
            echo 'List of seven lowest temperatures : ';
            asort($nums);
            $i=1;
            foreach($nums as $num){
                echo $num . ", "; 
                if($i == 7)  break;  
                $i++;
            }
            echo "</br>";
            echo "List of seven highest temperatures : ";

            for($i=0;$i<7;$i++){
                rsort($nums);
                 echo$nums[$i] . ', ';
            };

            ?>
        </div>
    </div>
</body>
</html>