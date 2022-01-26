<!-- Exercice 1 Exécuter le script colyseum.sql fourni avant de commencer. Tous les résultats devront être affichés dans une page index.php.

Afficher tous les clients. -->

<?php

$sqlQueryClients = 'SELECT `id`, `lastName`, `firstName`, `cardNumber`, DATE_FORMAT (`birthDate`, "%d/%m/%Y") AS `birthDate`, `card` FROM `clients`';

$clients = $db->query($sqlQueryClients);

$clientsList = $clients->fetchAll(PDO::FETCH_OBJ);


?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice PDO</title>
</head>
<body>
    <h1>Les spectacles du colyseum</h1>
    <h2>Liste des clients</h2>
    <?php foreach ($clientsList as $client){
        ?>
        <ul>
            <li><?= 'Client numéro ' . $client->id ?></li>
    <li><?= 'Le nom de famille du client est  ' . $client->lastName ?></li>
    <li><?= 'Son prénom est ' . $client->firstName ?></li>
    <li><?= 'Sa date de naissance est ' . $client->birthDate ?></li>
    <li><?= $client->card == 1 ? 'Les quatre derniers numéros de sa carte sont ' . $client->cardNumber : 'Carte non renseignée' ?></li>
        </ul>
    <?php } ?>
</body>
</html>