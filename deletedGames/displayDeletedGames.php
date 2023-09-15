<?php

function displayDeletedGames(array $games)
{
    $title = '';
    foreach ($games as $game) {
        $title .=
            '<div class="game">' .
            "<h2>$game->name</h2><br>" .
            "<p>Franchise: $game->franchise</p><br>" .
            "<p>Price: £$game->price</p><br>" .
            "<p>Genre: $game->genre</p>" .
            '<form method="post" action="../src/softDeleteGame.php">' .
            '<input type="hidden" name="gameId" value="' . $game->id . '">' .
            '<input type="hidden" name="deleted" value="' . $game->deleted . '">' .
            '<button type="submit">Restore</button>' .
            '</form>' .
            '</div>';
    }
    if (isset($_GET['error'])) {
        echo '<p>Restore Unsuccessful!</p>';
    }
    if ($title === '') {
        return 'No Games Available';
    }
    return $title;
}
