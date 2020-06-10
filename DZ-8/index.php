<?php
echo "<h1>dz-8</h1>";

echo "----------------------------------------------task 1----------------------------------------------"."<br>";

$arr1=array (
    'first'  => array ('one', 'two', 'three'),
    'second' => array ('four', 'five', 'six'),
    'third'  => array ('seven', 'eight', 'nine')
);

$arr2=$arr1;

echo "<pre>";
var_dump ($arr1);


echo "----------------------------------------------task 2----------------------------------------------"."<br>";

foreach ($arr1 as $number => $value) {
    foreach ($value as $arr1) {
        print "$number = $arr1"."<br>";  
    }
};



echo "----------------------------------------------task 3----------------------------------------------"."<br>";

foreach ($arr2 as $value) {
    echo "<pre>";
    print_r($value);
};
echo "<br>";

foreach($arr2 as $num => $val){
     print "key "."$num"."<br>"; 
};
echo "<br>";

for ($i=0; $i<count($arr2);$i++){
    echo "$i"."<br>";
};


echo "----------------------------------------------task 4----------------------------------------------"."<br>";

$arr3 = array('red', 'green', 'blue', 'yellow');
$arr4 = array('cherry','apple', 'currants', 'lemon');
$arr5 = array_merge($arr3, $arr4);
$arr6 = array_combine($arr3, $arr4);

print_r($arr5);
echo "<br>";
print_r($arr6);


echo "----------------------------------------------task 5----------------------------------------------"."<br>";

$str = join($arr6,", ");
echo "$str"."<br>";
echo "<br>";

$str2='';
foreach($arr6 as $key => $val){
    $str2 .= ",$val";
}
echo $str2 = substr($str2, 1)."<br>";


echo "----------------------------------------------task 6----------------------------------------------"."<br>";

$pos = array_search('blue', $arr3);
if ($pos !== false){
    echo "id key = "."$pos"."<br>";
};
echo "<br>";

var_dump(array_filter($arr6, function($v) {
    return $v == 'blue';
}, ARRAY_FILTER_USE_KEY));


echo "----------------------------------------------task 7----------------------------------------------"."<br>";


$task7 = usort($arr3, function($a, $b){
    return strnatcmp($b , $a);
});
echo "$task7"."<br>";
echo "<br>";

function u_length($arr3, $arr4) {
    $a = strlen($arr3);
    $b = strlen($arr4);
    if ($a == $b) return 0;
    if ($a > $b) return 1;
    return -1;
}
function map_length($arr1) {
    return strlen($arr1);
}

var_dump($arr3, $arr4);
echo "<br>";
echo "$arr1". "<br>";


echo "----------------------------------------------task 8----------------------------------------------"."<br>";

$arr7=array(
    '1' => "cold",
    '2' => "hot"
);
array_walk($arr7, function (&$value) {
    $value = htmlentities($value, ENT_QUOTES);
});

foreach ($arr7 as $stan) {
    print "$stan\n";
}
echo "<br>";

$arr8=array(
    '1' => array(
        'firstname' => "Rey",
        'lastname'  => "Smith"
    ),
    '2' => array(
        'firstname' => "Johnny",
        'lastname'  => "Depp"
));
array_walk_recursive($arr8, function (&$value) {
    $value = htmlentities($value, ENT_QUOTES);
});
foreach ($arr8 as $nametypes) {
    foreach ($nametypes as $name) {
    print "$name\n";
    }
}
echo "------------------------------------------------end------------------------------------------------"."<br>";
