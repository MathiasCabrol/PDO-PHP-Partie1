<?php
// Souvent on identifie cet objet par la variable $conn ou $db
try
{
	$db = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>