<?php

use GameCollection\Entities\Game;
use PHPUnit\Framework\TestCase;

require_once 'vendor/autoload.php';
require 'deletedGames/displayDeletedGames.php';

class displayDeletedGamesTest extends TestCase
{
    public function test_success_returnNoGames()
    {
        $input = [];

        $expected = 'No Games Available';

        $result = displayDeletedGames($input);

        $this->assertEquals($expected, $result);
    }
    public function test_success_returnAllDeletedGames()
    {
        $input = [
            new Game(
                4,
                'Mario',
                'Mario',
                10.99,
                'horror',
                1
            )
        ];

        $expected = '<div class="game"><h2>Mario</h2><br><p>Franchise: Mario</p><br><p>Price: £10.99</p><br><p>Genre: horror</p><form method="post" action="../src/softDeleteGame.php"><input type="hidden" name="gameId" value="4"><input type="hidden" name="deleted" value="1"><button type="submit">Restore</button></form></div>';


        $result = displayDeletedGames($input);

        $this->assertEquals($expected, $result);
    }

    public function test_malformed_notAnArray()
    {
        $input = 10;

        $this->expectException(TypeError::class);

        displayDeletedGames($input);
    }
}
