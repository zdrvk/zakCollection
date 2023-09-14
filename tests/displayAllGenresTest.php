<?php

use PHPUnit\Framework\TestCase;

require_once 'vendor/autoload.php';
require 'src/displayAllGenres.php';

class displayAllGenresTest extends TestCase
{
    public function test_success_DisplayGenres()
    {
        $input = [
            0 => [
                'genre' => 'action',
                'id' => 1,
            ],
            1 => [
                'genre' => 'adventure',
                'id' => 2,
            ],
            2 => [
                'genre' => 'horro',
                'id' => 3,
            ],
            3 => [
                'genre' => 'RPG',
                'id' => 4,
            ],
            4 => [
                'genre' => 'puzzle',
                'id' => 5,
            ],
        ];

        $expected = "<option value='1'>action</option><option value='2'>adventure</option><option value='3'>horro</option><option value='4'>RPG</option><option value='5'>puzzle</option>";

        $result = displayAllGenres($input);

        $this->assertEquals($expected, $result);
    }

    public function test_malformed_WrongInput()
    {
        $input = 10;

        $this->expectException(TypeError::class);

        displayAllGenres($input);
    }
}
