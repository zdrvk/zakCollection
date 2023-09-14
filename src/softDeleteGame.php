<?php

use GameCollection\Models\GameModel;

require_once '../vendor/autoload.php';
require_once 'DB.php';
$id = $_POST['gameId'];

$softDelete = new GameModel($db);
$success = $softDelete->softDeleteGame($id);

if (!$success) {
    return header("Location: ../index.php?error=1");
}
return header("Location: ../index.php");
