<?php

use PHPUnit\Framework\TestCase;

require_once 'src/newGameFormValidation.php';

class newGameFormValidationTest extends TestCase
{
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
    public function testValidationWithInvalidData()
    {

        $name = '';
        $franchise = '';
        $price = 'Invalid Price';
        $genre_id = 'Select';

        $errors = formValidation($name, $franchise, $price, $genre_id);

        $this->assertStringContainsString('Name is required.', $errors);
        $this->assertStringContainsString('Franchise is required.', $errors);
        $this->assertStringContainsString('Price must be in the format of 10.99.', $errors);
        $this->assertStringContainsString('Please select a genre.', $errors);
    }
}
