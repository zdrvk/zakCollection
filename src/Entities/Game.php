<?php

namespace GameCollection\Entities;

class Game
{
    public int $id;
    public string $name;
    public string $franchise;
    public float $price;
    public string $genre;
    public int $deleted;

    public function __construct(
        int $id,
        string $name,
        string $franchise,
        float $price,
        string $genre,
        int $deleted
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->franchise = $franchise;
        $this->price = $price;
        $this->genre = $genre;
        $this->deleted = $deleted;
    }
}
