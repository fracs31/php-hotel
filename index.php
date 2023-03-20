<!-- PHP -->
<?php
    $hotels = [
        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],
    ];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>PHP Hotel</title>
</head>
<body>
    <!-- Main -->
    <main class="main-content">
        <!-- Container -->
        <div class="container">
            <!-- Form -->
            <form class="form" action="./index.php" method="GET">
                <!-- Filtro per parcheggio -->
                <input type="checkbox" name="parking" value="Parcheggio">
                <label for="parking">Parcheggio</label>
                <!-- Filtro per voto -->
                <select name="vote">
                    <!-- Opzione -->
                    <option value="">Filtra per voto</option>
                    <!-- Opzione -->
                    <option value="1">1</option>
                    <!-- Opzione -->
                    <option value="2">2</option>
                    <!-- Opzione -->
                    <option value="3">3</option>
                    <!-- Opzione -->
                    <option value="4">4</option>
                    <!-- Opzione -->
                    <option value="5">5</option>
                </select>
                <!-- Submit -->
                <input type="submit" name="filter" value="Filtra">
            </form>
            <!-- Tabella -->
            <table class="table">
                <!-- Testa della tabella -->
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrizione</th>
                        <th>Parcheggio</th>
                        <th>Voto</th>
                        <th>Distanza dal centro</th>
                    </tr>
                </thead>
                <!-- Corpo della tabella -->
                <tbody>
                    <!-- PHP -->
                    <?php
                        //Se il filtro non è attivo, stampo tutta la tabella
                        if (!isset($_GET['filter'])) {
                            //Ciclo
                            foreach ($hotels as $hotel) {
                                echo "<tr>"; //apro la riga della tabella
                                //Ciclo
                                foreach ($hotel as $key => $value) {
                                    //Se la chiave dell'array è il parcheggio
                                    if ($key == "parking") {
                                        //Se il parcheggio è disponibile
                                        if ($value == true) {
                                            echo "<td>Disponibile</td>"; //dico che il parcheggio è disponbile
                                        } else { //altrimenti
                                            echo "<td>Non disponibile</td>"; //dico che il parcheggio non è disponbile
                                        }
                                    } else { //altrimenti
                                        echo "<td>$value</td>"; //stampo i dati dell'array
                                    }
                                }
                                echo "</tr>"; //chiudo la riga della tabella
                            }
                        } else { //altrimenti
                            //Se viene attivato il  filtro del parcheggio
                            if (isset($_GET['parking']) && isset($_GET['vote'])) {
                                //Ciclo
                                foreach ($hotels as $hotel) {
                                    echo "<tr>"; //apro la riga della tabella
                                    //Se il parcheggio dell'hotel è presente e il voto dell'hotel è uguale a quello cercato dell'utente
                                    if ($hotel['parking'] == true && $hotel['vote'] == $_GET['vote']) {
                                        //Ciclo
                                        foreach ($hotel as $key => $value) {
                                            //Se la chiave dell'array è il parcheggio
                                            if ($key == "parking") {
                                                //Se il parcheggio è disponibile
                                                if ($value == true) {
                                                    echo "<td>Disponibile</td>"; //dico che il parcheggio è disponbile
                                                } else { //altrimenti
                                                    echo "<td>Non disponibile</td>"; //dico che il parcheggio non è disponbile
                                                }
                                            } else { //altrimenti
                                                echo "<td>$value</td>"; //stampo i dati dell'array
                                            }
                                        }
                                    }
                                    echo "</tr>"; //chiudo la riga della tabella
                                }
                            }
                            //Se viene attivato il filtro del voto
                            if (isset($_GET['vote']) && !isset($_GET['parking'])) {
                                //Ciclo
                                foreach ($hotels as $hotel) {
                                    echo "<tr>"; //apro la riga della tabella
                                    //Se il voto dell'hotel è uguale a quello del filtro
                                    if ($hotel['vote'] == $_GET['vote']) {
                                        //Ciclo
                                        foreach ($hotel as $key => $value) {
                                            //Se la chiave dell'array è il parcheggio
                                            if ($key == "parking") {
                                                //Se il parcheggio è disponibile
                                                if ($value == true) {
                                                    echo "<td>Disponibile</td>"; //dico che il parcheggio è disponbile
                                                } else { //altrimenti
                                                    echo "<td>Non disponibile</td>"; //dico che il parcheggio non è disponbile
                                                }
                                            } else { //altrimenti
                                                echo "<td>$value</td>"; //stampo i dati dell'array
                                            }
                                        }
                                    }
                                    echo "</tr>"; //chiudo la riga della tabella
                                }
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>