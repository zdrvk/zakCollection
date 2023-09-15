<?php

use GameCollection\Models\GameModel;

require_once '../vendor/autoload.php';
require_once 'DB.php';
$id = $_POST['gameId'];
$deleted = $_POST['deleted'];

$softDelete = new GameModel($db);
$success = $softDelete->toggleGameStatus($id, $deleted);

if (!$success && $deleted == 0) {
    return header("Location: ../index.php?error=1");
} else if (!$success && $deleted == 1) {
    return header("Location: ../deletedGames/deletedGames.php?error=1");
} else if ($deleted == 0) {
    return header("Location: ../index.php");
} else {
    return header("Location: ../deletedGames/deletedGames.php");
}
