<?php

// use GameCollection\Entities\Game;
use GameCollection\Models\GameModel;
use PHPUnit\Framework\TestCase;

require_once 'vendor/autoload.php';
require 'src/displayAllGenres.php';

class displayAllGenresTest extends TestCase
{
    // public function test_success_DisplayGenres()
    // {
    //     $input = [];

    //     $expected = "<option value='12'>horror</option>";

    //     $result = displayAllGenres($input);

    //     $this->assertEquals($expected, $result);
    // }
    //ASHHHH
    public function test_malformed_WrongInput()
    {
        $input = 10;

        $this->expectException(TypeError::class);

        displayAllGenres($input);
    }
}
