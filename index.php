<?php

use GameCollection\Models\GameModel;

require_once 'vendor/autoload.php';
require_once './src/DB.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Template</title>

    <meta name="description" content="Template HTML file">
    <meta name="author" content="iO Academy">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="css/styles.css">

    <link rel="icon" href="images/favicon.png" sizes="192x192">
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/favicon.png">

    <script defer src="js/index.js"></script>
</head>

<body>

    <h1>Games Collection</h1>
    <?php

    $gameModel = new GameModel($db);
    $games = $gameModel->getAllGames();

    foreach ($games as $game) {
        echo "<h2>$game->name</h2>";
        echo "<p>$game->franchise</p>";
        echo "<p>$game->price</p>";
        echo "<p>$game->genre</p>";
    }
    ?>
</body>

</html>