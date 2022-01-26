<?php

include '../requeteBDD.php';

/**
 * Requête SQL permettant d'afficher uniquement les clients disposant d'une carte de crédit
 */

$sqlQueryClientsTable = 'SELECT `lastName`, `firstName`, DATE_FORMAT(`birthDate`, "%d/%m/%Y") AS `birthDate`, IF(`card` = 1, "Oui", "Non") AS `card`, `cardNumber` FROM `clients`';
$ClientsTable = $db->query($sqlQueryClientsTable);
$ClientsTableList = $ClientsTable->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<h1>Spectacles triés par ordre alphabétique.</h1>
        <?php foreach ($ClientsTableList as $ClientTable){
        ?>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Carte</th>
                    <?= $ClientTable->card == 'Oui' ? '<th>Numéro de carte</th>' : '' ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $ClientTable->lastName ?></td>
                    <td><?= $ClientTable->firstName ?></td>
                    <td><?= $ClientTable->birthDate ?></td>
                    <td><?= $ClientTable->card  ?></td>
                    <?= $ClientTable->card == 'Oui' ? '<td>' . $ClientTable->cardNumber . '</td>' : '' ?>
                </tr>
            </tbody>
        </table>
        <?php } ?>
</body>
</html>

