<?php

require_once __DIR__ . '/../vendor/autoload.php';

$file = '/data/original/top10milliondomains.csv';

$csvFile = new Keboola\Csv\CsvReader(__DIR__ . '/../data/small/top10milliondomains.csv');
foreach($csvFile as $row) {
	list($num, $domain, $rank) = $row;

}


$client = new GuzzleHttp\Client();


echo (
    "<table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Domain</th>
                        <th >IP-address</th>
                        <th>Rank</th>
                        <th>Status</th>
                        <th>Last checked</th>
                    </tr>
                </thead>
                <tbody>"
);
$i=1;

foreach($csvFile as $row) {
    list($num, $domain, $rank) = $row;
    
    echo(
        "<tr>
        <td>". $i++ ."</td>" 
    );
    echo (
        "<td><a href=\"$domain\" target=\"__blank\">$domain</a></td>
         <td>" . gethostbyname($domain) . "</td>
         <td>$rank</td>"
    );
    $response = $client->request('GET', gethostbyname($domain), ['timeout' => 3.14]);
    echo "<td>".$response->getStatusCode()."</td>"."<td>last update</td>"."</tr>";
}
echo (
    "</tbody>
    </table> "
);