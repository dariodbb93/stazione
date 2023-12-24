<?php

$host = '93.93.114.144';
$port = 5432;
$dbname = 'meteo';
$user = 'dario';
$password = 'HotDingo627';
$connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
$query = "SELECT * FROM previsioni GROUP BY tramonto";
$result = pg_query($connection, $query);
$data = array();

while($row = pg_fetch_assoc($result)){

array_push($data, [$row['temperatura'], $row['umidita'], $row['tramonto']]);


};

$dataJson = json_encode($data);

pg_close($connection);

echo ($dataJson);
