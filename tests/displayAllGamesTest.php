<?php

use GameCollection\Entities\Game;
use PHPUnit\Framework\TestCase;

require_once 'vendor/autoload.php';
require 'src/displayAllGames.php';

class displayAllGamesTest extends TestCase
{
    public function test_success_returnNoGames()
    {
        $input = [];

        $expected = `No Games Available`;

        $result = displayAllGames($input);

        $this->assertEquals($expected, $result);
    }
    public function test_success_returnAllGames()
    {
        $input = [
            new Game(
                'Mario',
                'Mario',
                10.99,
                'horror'
            )
        ];

        $expected = '<div class="game"><h2>Mario</h2><br><p>Franchise: Mario</p><br><p>Price: £10.99</p><br><p>Genre: horror</p></div>';

        $result = displayAllGames($input);

        $this->assertEquals($expected, $result);
    }

    public function test_malformed_notAnArray()
    {
        $input = 10;

        $this->expectException(TypeError::class);

        displayAllGames($input);
    }
}
