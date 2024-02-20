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
        <table>
            <thead>
                <th>Name</th>
                <th>Description</th>
                <th>Parking</th>
                <th>Vote</th>
                <th>Distance to center</th>
            </thead>
            <tbody>
                <?php foreach($hotels as $hotel) :?>
                    <tr>
                        <td><?= $hotel['name']?></td>
                        <td><?= $hotel['description']?></td>
                        <td><?= $parking = $hotel['parking'] ? 'true' : 'false' ?></td>
                        <td><?= $hotel['vote']?></td>
                        <td><?= $hotel['distance_to_center']?></td>
                    </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </section>
</body>
</html>