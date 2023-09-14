<?php

function displayAllGames(array $games)
{
    $title = '';
    foreach ($games as $game) {
        $title .=
            '<div class="game">' .
            "<h2>$game->name</h2><br>" .
            "<p>Franchise: $game->franchise</p><br>" .
            "<p>Price: £$game->price</p><br>" .
            "<p>Genre: $game->genre</p>" .
            '</div>';
    }

    if ($title === '') {
        return `No Games Available`;
    }
    return $title;
}
