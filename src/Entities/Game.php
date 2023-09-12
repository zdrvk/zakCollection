<?php

namespace GameCollection\Entities;

class Game
{
    public string $name;
    public string $franchise;
    public float $price;
    public string $genre;

    public function __construct(
        string $name,
        string $franchise,
        float $price,
        string $genre
    ) {
        $this->name = $name;
        $this->franchise = $franchise;
        $this->price = $price;
        $this->genre = $genre;
    }
}
