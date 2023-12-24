<?php

$host = '93.93.114.144';
$port = 5432;
$dbname = 'meteo';
$user = 'dario';
$password = 'HotDingo627';
$connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
$query = "SELECT * FROM previsioni";
$result = pg_query($connection, $query);
while($row = pg_fetch_assoc($result)){
    echo $row['temperatura'] . $row['umidita'] . $row['tramonto']. "<br>";

};


pg_close($connection);
