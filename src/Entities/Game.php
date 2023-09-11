<?php

namespace GameCollection\Entities;

class Game
{
    public string $name;
    public string $franchise;
    public float $price;
    public int $genre_id;
    public string $genre;

    public function __construct(
        string $name,
        string $franchise,
        float $price,
        int $genre_id,
        string $genre
    ) {
        $this->name = $name;
        $this->franchise = $franchise;
        $this->price = $price;
        $this->genre_id = $genre_id;
        $this->genre = $genre;
    }
}
