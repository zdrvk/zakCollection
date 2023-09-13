<?php
require_once '../vendor/autoload.php';
require_once '../src/DB.php';

use GameCollection\Models\GameModel;

$name = $_POST['name'];
$franchise = $_POST['franchise'];
$price = $_POST['price'];
$genre_id = $_POST['genre_id'];

$errors = '';

if (empty($name)) {
    $errors .= "<p>Name is required.</p>";
}

if (empty($franchise)) {
    $errors .= "<p>Franchise is required.</p>";
}

if (!preg_match("/^\d+\.\d{2}$/", $price)) {
    $errors .= "<p>Price must be in the format of 10.99.</p>";
}

if ($genre_id == "Select") {
    $errors .= "<p>Please select a genre.</p>";
}

if (!$errors == '') {
    header("Location: addNewGame.php?errors=$errors");
}


$gameModel = new GameModel($db);
$gameModel->addNewGame(
    $name,
    $franchise,
    $price,
    $genre_id
);

header("Location: addNewGame.php");
