<?php
require_once '../vendor/autoload.php';
require_once '../src/DB.php';
require '../src/displayAllGames.php';
require '../src/displayAllGenres.php';

use GameCollection\Models\GenreModel;

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
    <header>
        <div class="header">
            <h1>Add New Game</h1>
        </div>
    </header>
    <div class="border">

        <a class="links" href="../index.php"> <- Back to Catalogue</a>
    </div>
    <main>
        <div class="container">
            <form class="newGame" method="post" action="newGame_form.php">
                <label for="name">Name:</label>
                <input type="text" name="name"><br>

                <label for="franchise">Franchise:</label>
                <input type="text" name="franchise"><br>

                <label for="price">Price (e.g., 10.99):</label>
                <input type="text" name="price" pattern="\d+\.\d{2}"><br>

                <label for="genre">Genre:</label>
                <select name="genre_id">
                    <option> Select </option>
                    <?php
                    $gameModel = new GenreModel($db);
                    $genres = $gameModel->getAllGenres();
                    echo displayAllGenres($genres);
                    ?>
                </select><br><br>

                <input class="button " type="submit" value="Add Game">
            </form>
        </div>
    </main>
    <div class="error">
        <?php
        if (isset($_GET['errors'])) {
            echo $_GET['errors'];
        }
        ?>
    </div>
</body>

</html>