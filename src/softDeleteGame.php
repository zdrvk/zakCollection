<?php
require_once 'DB.php';
$id = $_POST['gameId'];

$query = $db->prepare("
UPDATE `games` SET `games`.`deleted` = 1 WHERE `games`.`id` = :id;
");

$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();

header("Location: ../index.php");
