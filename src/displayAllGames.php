<?php

function displayAllGames(array $games)
{
    $title = '';
    foreach ($games as $game) {
        if ($game->deleted !== 1) {
            $title .=
                '<div class="game">' .
                "<h2>$game->name</h2><br>" .
                "<p>Franchise: $game->franchise</p><br>" .
                "<p>Price: £$game->price</p><br>" .
                "<p>Genre: $game->genre</p>" .
                '<form method="post" action="src/softDeleteGame.php">' .
                '<input type="hidden" name="gameId" value="' . $game->id . '">' .
                '<button type="submit">Delete</button>' .
                '</form>' .
                '</div>';
        }
    }
    if ($title === '') {
        return `No Games Available`;
    }
    return $title;
}
