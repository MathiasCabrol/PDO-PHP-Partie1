<?php

include '../requeteBDD.php';

/**
 * Requête SQL pour séléctionner les 20 premiers clients
 */

$sqlQueryTwentyClients = 'SELECT `id`, `lastName`, `firstName`, `cardNumber`, DATE_FORMAT (`birthDate`, "$d/$m/$Y") AS `birthDate`, `card` FROM clients  ORDER BY lastName DESC LIMIT 20';

$twentyClients  = $db->query($sqlQueryTwentyClients);

$twentyClientsList = $twentyClients->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<h1>20 premiers clients triés par nom de famille décroissant</h1>
    <?php foreach ($twentyClientsList as $firstClients){
        ?>
        <ul>
            <li><?= 'Client numéro ' . $firstClients->id ?></li>
    <li><?= 'Le nom de famille du client est  ' . $firstClients->lastName ?></li>
    <li><?= 'Son prénom est ' . $firstClients->firstName ?></li>
    <li><?= 'Sa date de naissance est ' . $firstClients->birthDate ?></li>
    <li><?= $firstClients->card == 1 ? 'Les quattres derniers numéros de sa carte sont ' . $firstClients->cardNumber : 'Carte non renseignée' ?></li>
        </ul>
        <?php } ?>
</body>

</html>