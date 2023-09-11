<?php

function displayAllGames($games)
{
    $title = '';
    foreach ($games as $game) {
        $title .=
            '<span class="game">' .
            "<h2>$game->name</h2>" .
            "<p>Franchise: $game->franchise</p>" .
            "<p>Price: $game->price</p>" .
            "<p>Genre: $game->genre</p>" .
            '</span>';
    }

    if ($title === '') {
        return 'No Gmaes Available';
    }
    return $title;
}