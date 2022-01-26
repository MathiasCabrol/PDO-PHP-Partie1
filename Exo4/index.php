<?php

include '../requeteBDD.php';

/**
 * Requête SQL permettant d'afficher uniquement les clients disposant d'une carte de crédit
 */

$sqlQueryCard = 'SELECT `id`, `lastName`, `firstName`, `cardNumber`, DATE_FORMAT (`birthDate`, "%d/%m/%Y") AS `birthDate` FROM `clients` WHERE `card` = 1';
$cardClients = $db->query($sqlQueryCard);
$cardClientsList = $cardClients->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Clients avec un carte renseignée</h1>
        <?php foreach ($cardClientsList as $cardClients){
        ?>
        <ul>
            <li><?= 'Client numéro ' . $cardClients->id ?></li>
    <li><?= 'Le nom de famille du client est  ' . $cardClients->lastName ?></li>
    <li><?= 'Son prénom est ' . $cardClients->firstName ?></li>
    <li><?= 'Sa date de naissance est ' . $cardClients->birthDate ?></li>
    <li><?= 'Les quattres derniers numéros de sa carte sont ' . $cardClients->cardNumber ?></li>
        </ul>
        <?php } ?>
</body>
</html>

