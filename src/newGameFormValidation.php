<?php

function formValidation($name, $franchise, $price, $genre_id)
{
    $errors = '';

    if (trim($name) === '') {
        $errors .= "<p>Name is required.</p>";
    }

    if (trim($franchise) === '') {
        $errors .= "<p>Franchise is required.</p>";
    }

    if (!preg_match("/^\d+\.\d{2}$/", $price)) {
        $errors .= "<p>Price must be in the format of 10.99.</p>";
    }
    // if ($genre_id == "Select") this can be tricked in the inspector tho!
    if ($genre_id == "Select") {
        $errors .= "<p>Please select a genre.</p>";
    }

    return $errors;
}
