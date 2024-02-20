<?php
include 'data.php';

// Creo subito l'array degli hotel filtrati così non ho problemi all'avvio della pagina
$filter_hotels = [...$hotels];
function is_parking($hotels, $parking_search, $hotel_vote){
    // creo l'array filtrato
    $filtered_results = array();
    // Se non c'è niente in nessuno dei due campi ritorno una copia che stamperò
    if(!$parking_search && !$hotel_vote) return $filtered_results = [...$hotels];

    // Altrimenti faccio il controllo per trovare chi ha i paracheggi vuoti o pieni e per controllare il voto.
    foreach($hotels as $hotel){

        // Rinomino il i booleani in stringa così da poterli comparare con i value che ho raccolto
        $parking = $hotel['parking'] ? 'true' : 'false';

        /*
        Faccio la validazione del parcheggio fuori, così se per caso non ho messo nessun value nella raccolta
        del value del parcheggio lo forzo a true per fare la ricerca sul voto
        */
        $parking_validation = $parking_search ? $parking === $parking_search : true;

        // Se il parcheggio va bene e se il voto dell'hotel è maggiore-uguale a quello richiesto pusho l'hotel negli
        // hotel filtrati
        if($parking_validation && $hotel['vote'] >= $hotel_vote){
            array_push($filtered_results, $hotel);
        }
    };

    // Ritorno l'array filtrato che stamperò a pagina.
    return $filtered_results;
};

// Appena ricevo dei dati faccio partire la ricerca. 
if(count($_GET)){
    $parking_search = $_GET['is-parking'];
    $hotel_vote = intval($_GET['vote-value']);
    $filter_hotels = is_parking($hotels, $parking_search, $hotel_vote);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css' integrity='sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==' crossorigin='anonymous'/>
    <title>Document</title>
</head>
<body class="bg-dark text-white">
    <section class="container mt-5">
        <h2>Hotels</h2>
        <form class="d-flex gap-4 my-4">
            <select class="form-select w-auto" name="is-parking" id="parking">
                <option value="">Select option</option>
                <option value="true">Empty</option>
                <option value="false">Full</option>
            </select>
            <select class="form-select w-auto" name="vote-value" id="vote">
                <option value="">Scegli un voto</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <button class="btn btn-primary" type="submit">Search</button>
            <button class="btn btn-info" type="reset">Reset</button>
        </form>
        <table class="table table-dark">
            <thead>
                <th>Name</th>
                <th>Description</th>
                <th>Parking</th>
                <th>Vote</th>
                <th>Distance to center</th>
            </thead>
            <tbody>
                <?php foreach($filter_hotels as $hotel) :?>
                    <tr>
                        <td><?= $hotel['name']?></td>
                        <td><?= $hotel['description']?></td>
                        <td><?= $parking = $hotel['parking'] ? 'SI' : 'NO' ?></td>
                        <td><?= $hotel['vote']?></td>
                        <td><?= $hotel['distance_to_center']?></td>                        
                    </tr>                    
                <?php endforeach?>
            </tbody>
        </table>
        <a href="http://localhost/">Torna indietro</a>
    </section>
</body>
</html>