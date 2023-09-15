<?php

function displayAllGenres($genres)
{
    $option = '';
    foreach ($genres as $genre) {
        $option .= ("<option value='" . $genre['id'] . "'>" . $genre['genre'] . "</option>");
    }
    return $option;
}
