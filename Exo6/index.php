<?php

include '../requeteBDD.php';

/**
 * Requête SQL permettant d'afficher uniquement les clients disposant d'une carte de crédit
 */

$sqlQueryShowDetails = 'SELECT `performer`, `title`, `startTime`, DATE_FORMAT(`date`, "%d/%m/%Y") AS `date` FROM `shows` ORDER BY `title` ASC';
$ShowDetailsClients = $db->query($sqlQueryShowDetails);
$ShowDetailsClientsList = $ShowDetailsClients->fetchAll(PDO::FETCH_OBJ);

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
<h1>Spectacles triés par ordre alphabétique.</h1>
        <?php foreach ($ShowDetailsClientsList as $ShowDetail){
        ?>
        <p><?= $ShowDetail->title . ' par ' . $ShowDetail->performer . ', le ' . $ShowDetail->date . ' à ' . $ShowDetail->startTime ?></p>
        <?php } ?>
</body>
</html>

