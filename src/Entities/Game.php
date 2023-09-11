<?php

namespace GameCollection\Entities;

readonly class Game
{
    public string $name;
    public string $franchise;
    public int $price;
    public int $genre_id;

    public function __construct(
        string $name,
        string $franchise,
        int $price,
        int $genre_id
    ) {
        $this->name = $name;
        $this->franchise = $franchise;
        $this->price = $price;
        $this->genre_id = $genre_id;
    }
}
