<?php

$server = "mysql:host=localhost; dbname=dz-20";
$user = 'root';
$pass = '';
$ucity = '';
$ucommission = '';

if(isset($_POST["submit"]))
{
    $ucity = $_POST['city'];
    $ucommission = $_POST['commission'];
}

try {
    $connect = new PDO($server , $user , $pass);
}
catch (PDOException $error)
{
    echo "Підключитися не вдалось: " . $erorr -> getMessage();
}

/////////////////////////////////////////////////////////////////////////////////////////

$city = $connect->query('SELECT DISTINCT `seller_city` FROM `sellers`');
$commission = $connect->query('SELECT DISTINCT `commission` FROM `sellers`');

if(!empty($ucity) and !empty($ucommission))
{
    $sellers = $connect->query(
    "SELECT * FROM `sellers` WHERE `seller_city` = \"$ucity\" AND `commission` = \"$ucommission\" ORDER BY `seller_id` "
    );
}elseif(!empty($ucity) xor !empty($ucommission)) {
    $sellers = $connect->query(
        "SELECT * FROM `sellers` WHERE `seller_city` = \"$ucity\" OR `commission` = \"$ucommission\" ORDER BY `seller_id` "
        );
}else {
    $sellers = $connect->query(
      'SELECT * FROM `sellers` ORDER BY `seller_id`'
    );
}


$city -> setFetchMode(PDO::FETCH_ASSOC);
$commission -> setFetchMode(PDO::FETCH_ASSOC);
$sellers -> setFetchMode(PDO::FETCH_ASSOC);

/////////////////////////////////////////////////////////////////////////////////////////

$customers = $connect->query(
    "SELECT
    `customers`.`customer_id`, `customers`.`customer_name`,
    `customers`.`customer_city`, `customers`.`rating`,
     `sellers`.`seller_id`, `sellers`.`seller_name`
    FROM `customers`
    JOIN `sellers` ON `customers`.`seller_id` = `sellers`.`seller_id`
    ORDER BY `sellers`.`seller_id` ASC, `customers`.`customer_id`"
);

$customers->setFetchMode(PDO::FETCH_ASSOC);

/////////////////////////////////////////////////////////////////////////////////////////

echo "<div style=\"width: 700px; margin: 50px auto;\">";
echo "<h2 style=\"text-align:center\">Sellers</h2>";
echo(
    "<form action=\"index.php\" method=\"POST\">
        <label>
            <span>City </span>
            <select name=\"city\">
            <option selected ></option>"
);

while($row = $city->fetch())
{
    echo "<option value=\"{$row['seller_city']}\">{$row['seller_city']}</option>";
}

echo(
            "</select>
        </label>
        <label>
            <span style=\"padding-left:50px;\"> Commission </span>
            <select name=\"commission\">
            <option selected ></option>"
);

while($row = $commission->fetch())
{
    echo "<option value=\"{$row['commission']}\">{$row['commission']}%</option>";
}

echo(
            "</select>
        </label>
        <input type=\"submit\" name=\"submit\" value=\"пошук\" style=\"margin-left:50px;\">
    </form>"."<br>"
);
echo(
    "<table>
        <thead>
            <tr><strong> Seller id </strong> </tr>
            <tr><strong> Seller name </strong> </tr>
            <tr><strong> Seller city </strong> </tr>
            <tr><strong> Commission </strong> </tr>
        </thead>
        <tbody>"."<br>"."<br>"
);
while($row = $sellers->fetch()) {   
    echo "<tr><strong> {$row['seller_id']} </strong></tr>";  
    echo "<tr><strong> {$row['seller_name']} </strong></tr>";  
    echo "<tr><strong> {$row['seller_city']} </strong></tr>";  
    echo "<tr><strong> {$row['commission']}% </strong></tr>". "<br>";  
}
echo "</tbody></table></div>";
/////////////////////////////////////////////////////////////////////////////////////////
echo(
    "<style>
        strong{
            display: inline-block;
            width:150px;
            padding:3px 10px 3px 0;
            border-bottom:solid 1px red;
            text-align:center;
        }
        select{
            width:150px;
        }
    </style>"
);

/////////////////////////////////////////////////////////////////////////////////////////

echo "<div style=\"width: 1000px; margin: 50px auto;\">";
echo "<h2 style=\"text-align:center\">Customers</h2>";
echo(
    "<table>
        <thead>
            <tr><strong> Customer id </strong> </tr>
            <tr><strong> Customer name </strong> </tr>
            <tr><strong> Customer city </strong> </tr>
            <tr><strong> Rating </strong> </tr>
            <tr><strong> Seller id </strong> </tr>
            <tr><strong> Seller name </strong> </tr>
        </thead>
        <tbody>"."<br>"."<br>"
);
while($row = $customers->fetch())
{
    echo "<tr><strong> {$row['customer_id']} </strong></tr>";  
    echo "<tr><strong> {$row['customer_name']} </strong></tr>";  
    echo "<tr><strong> {$row['customer_city']} </strong></tr>";  
    echo "<tr><strong> {$row['rating']} </strong></tr>";  
    echo "<tr><strong> {$row['seller_id']}</strong></tr>"; 
    echo "<tr><strong> {$row['seller_name']}</strong></tr>". "<br>"; 
}
echo "</tbody></table></div>";
