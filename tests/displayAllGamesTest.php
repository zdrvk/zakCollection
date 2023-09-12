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

        $expected = '<span class="game"><h2>Mario</h2><p>Franchise: Mario</p><p>Price: 10.99</p><p>Genre: horror</p></span>';

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
