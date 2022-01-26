<?php

include '../requeteBDD.php';

/**
 * Requête SQL permettant d'afficher uniquement les clients disposant d'une carte de crédit
 */

$sqlQueryFirstLetter = 'SELECT `lastName`, `firstName` FROM `clients` WHERE `lastName` LIKE "M%"';
$FirstLetterClients = $db->query($sqlQueryFirstLetter);
$FirstLetterClientsList = $FirstLetterClients->fetchAll(PDO::FETCH_OBJ);

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
<h1>Clients avec un nom de famille commençant ar "M".</h1>
        <?php foreach ($FirstLetterClientsList as $FirstLetterClient){
        ?>
        <ul>
            <li><?= 'Le prénom du client est ' . $FirstLetterClient->firstName ?></li>
    <li><?= 'Le nom de famille du client est  ' . $FirstLetterClient->lastName ?></li>        </ul>
        <?php } ?>
</body>
</html>

