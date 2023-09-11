<?php

use GameCollection\Models\GameModel;

require_once 'vendor/autoload.php';
require_once './src/DB.php';
require 'src/displayAllGames.php';

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
    <header>
        <h1>Games Collection</h1>
    </header>
    <main>

        <?php

        $gameModel = new GameModel($db);
        $games = $gameModel->getAllGames();
        echo (DisplayAllGames($games));
        ?>

    </main>
    <footer>
        <p>Copyright blahblahblah
        </p>
    </footer>
</body>

</html>