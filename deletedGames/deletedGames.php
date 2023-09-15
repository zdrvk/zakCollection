<?php
require_once '../vendor/autoload.php';
require_once '../src/DB.php';
require 'displayDeletedGames.php';
require '../src/displayAllGenres.php';

use GameCollection\Models\GameModel;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add New Game</title>

    <meta name="description" content="Template HTML file">
    <meta name="author" content="iO Academy">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../css/styles.css">

    <link rel="icon" href="../images/favicon.png" sizes="192x192">
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/favicon.png">

    <script defer src="js/index.js"></script>
</head>

<body>
    <main>
        <a href="../index.php"><-- Catalogue</a>
                <?php

                $gameModel = new GameModel($db);
                $games = $gameModel->getAllGames(true);
                echo displayDeletedGames($games);

                ?>

    </main>
</body>