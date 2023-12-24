<?php

$host = '93.93.114.144';
$port = 5432;
$dbname = 'meteo';
$user = 'dario';
$password = 'HotDingo627';
$connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Modifica della query per raggruppare per tramonto
$query = "SELECT tramonto, AVG(temperatura) AS temperatura_media, AVG(umidita) AS umidita_media FROM previsioni GROUP BY tramonto";
$result = pg_query($connection, $query);

$data = array();

while ($row = pg_fetch_assoc($result)) {
    // Aggiungi i dati raggruppati all'array
    array_push($data, [
        $row['tramonto'],
        $row['temperatura_media'],
        $row['umidita_media'],
    ]);
}

$dataJson = json_encode($data);

pg_close($connection);

echo ($dataJson);
