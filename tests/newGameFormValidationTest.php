<?php

use PHPUnit\Framework\TestCase;

require_once 'src/newGameFormValidation.php';

class newGameFormValidationTest extends TestCase
{
    public function test_success_NameRequired()
    {
        $name = '';
        $franchise = 'Mario';
        $price = '10.99';
        $genre_id = '2';

        $expected = "<p>Name is required.</p>";

        $result = formValidation($name, $franchise, $price, $genre_id);

        $this->assertEquals($expected, $result);
    }
    public function test_success_FranchiseRequired()
    {
        $name = 'Super Mario';
        $franchise = '';
        $price = '10.99';
        $genre_id = '2';

        $expected = "<p>Franchise is required.</p>";

        $result = formValidation($name, $franchise, $price, $genre_id);

        $this->assertEquals($expected, $result);
    }

    public function test_success_PriceWrongFormat()
    {
        $name = 'Super Mario';
        $franchise = 'Mario';
        $price = '10,99';
        $genre_id = '2';

        $expected = "<p>Price must be in the format of 10.99.</p>";

        $result = formValidation($name, $franchise, $price, $genre_id);


        $this->assertEquals($expected, $result);
    }

    public function test_success_GenreRequired()
    {
        $name = 'Super Mario';
        $franchise = 'Mario';
        $price = '10.99';
        $genre_id = 'Select';

        $expected = "<p>Please select a genre.</p>";

        $result = formValidation($name, $franchise, $price, $genre_id);


        $this->assertEquals($expected, $result);
    }

    public function test_success_AllRequired()
    {
        $name = 'Super Mario';
        $franchise = 'Mario';
        $price = '10.99';
        $genre_id = '2';

        $expected = '';

        $result = formValidation($name, $franchise, $price, $genre_id);

        $this->assertEquals($expected, $result);
    }
}
//HOW CAN I MAKE THIS WORK???
    // public function test_success_invalidData()
    // {
    // $name = 'Super Mario';
    // $franchise = 'Mario';
    // $price = '10.99';
    // $genre_id = '2';

    //     $expectedNameError = "<p>Name is required.</p>";
    //     $expectedFranchiseError = "<p>Franchise is required.</p>";
    //     $expectedPriceError = "<p>Price must be in the format of 10.99.</p>";
    //     $expectedGenreError = "<p>Please select a genre.</p>";


    //     $result = formValidation($name, $franchise, $price, $genre_id);

    //     $this->assertEquals($expectedNameError, $result);
    //     $this->assertEquals($expectedFranchiseError, $result);
    //     $this->assertEquals($expectedPriceError, $result);
    //     $this->assertEquals($expectedGenreError, $result);
    // }