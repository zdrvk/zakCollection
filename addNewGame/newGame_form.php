<?php

require_once '../vendor/autoload.php';
require_once '../src/DB.php';
require_once '../src/newGameFormValidation.php';

use GameCollection\Models\GameModel;

$name = $_POST['name'];
$franchise = $_POST['franchise'];
$price = $_POST['price'];
$genre_id = $_POST['genre_id'];

$errors = formValidation($name, $franchise, $price, $genre_id);

if ($errors !== '') {
    header("Location: addNewGame.php?errors=$errors");
} else {


    $gameModel = new GameModel($db);
    $gameModel->addNewGame(
        $name,
        $franchise,
        $price,
        $genre_id
    );

    header("Location: addNewGame.php");
}
