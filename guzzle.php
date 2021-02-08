<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$response = $client->request('GET', 'http://www.omdbapi.com', [
    //    Lewat Params
    'query' =>  [
        'apikey' => 'afe9924b',
        's' => 'transformers'
    ]
]);



// Ambil Body-> Ambil Content
// Tambah true biar jadi array
$result = json_decode($response->getBody()->getContents(), true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie</title>
</head>

<body>
    <?php foreach ($result['Search'] as $movie) : ?>
        <ul>
            <li>Title : <?= $movie['Title']; ?></li>
            <li>Year : <?= $movie['Year']; ?></li>
            <li>
                <img src="<?= $movie['Poster']; ?>" width="80" alt="">
            </li>
        </ul>
    <?php endforeach; ?>
</body>

</html>