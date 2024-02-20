<?php
include 'data.php';

var_dump($hotels)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
        <h2>Hotels</h2>
        <?php foreach($hotels as $hotel) :?>
            <p><?= $hotel['name']?></p>
        <?php endforeach?>
    </section>
</body>
</html>