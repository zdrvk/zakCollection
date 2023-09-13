<?php
require_once '../vendor/autoload.php';
require_once '../src/DB.php';
require '../src/displayAllGames.php';

use GameCollection\Models\GameModel;
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
    <link rel="stylesheet" href="../css/styles.css">

    <link rel="icon" href="images/favicon.png" sizes="192x192">
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/favicon.png">

    <script defer src="js/index.js"></script>
</head>


<body>
    <header>
        <a href="../index.php"> <- Back to Catalogue</a>
                <h1>Add New Game</h1>
    </header>
    <form method="post" action="newGame_form.php">
        <label for="name">Name:</label><br>
        <input type="text" name="name" required><br>

        <label for="franchise">Franchise:</label><br>
        <input type="text" name="franchise" required><br>

        <label for="price">Price (e.g., 10.99):</label><br>
        <input type="text" name="price" pattern="\d+\.\d{2}" required><br>

        <label for="genre">Genre:</label><br>
        <select name="genre_id" required>
            <option> Select </option>
            <?php
            $gameModel = new GameModel($db);
            $genres = $gameModel->getAllGenres();
            foreach ($genres as $genre) {
                echo ("<option value='" . $genre['id'] . "'>" . $genre['genre'] . "</option>");
            }
            ?>
        </select><br><br>

        <input class="button " type="submit" value="Add Game">
    </form>
    <div class="error">
        <?php
        if (isset($_GET['errors'])) {
            echo $_GET['errors'];
        }
        ?>
    </div>
</body>

</html>