<?php

include '../requeteBDD.php';

/**
 *  Requête sql pour les types de spectacles.
 */

$sqlQueryShows = 'SELECT `type` FROM `showTypes`';

$shows = $db->query($sqlQueryShows);

$showsTypesList = $shows->fetchAll(PDO::FETCH_OBJ);

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
    <h1>Types de spectacles</h1>
    <select>
        <?php foreach ($showsTypesList as $show) {
        ?>
            <option><?= $show->type ?></option>
        <?php } ?>
    </select>
</body>

</html>