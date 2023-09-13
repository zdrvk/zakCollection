<?php

namespace GameCollection\Models;

use PDO;
use GameCollection\Entities\Game;

class GameModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function getAllGames(): array
    {
        $query = $this->db->prepare("SELECT `games`.`id`,
        `games`.`name`,
        `games`.`franchise`,
        `games`.`price`,
        `games`.`deleted`,
        `genre`.`genre`
        FROM `games`
            INNER JOIN `genre`
             ON `games`.`genre_id` = `genre`.`id`");

        $query->execute();

        $data = $query->fetchAll();

        $games = [];

        foreach ($data as $game) {

            $games[] = new Game(
                $game['id'],
                $game['name'],
                $game['franchise'],
                $game['price'],
                $game['genre'],
                $game['deleted']
            );
        }

        return $games;
    }
    public function getAllGenres()
    {
        $query = $this->db->prepare("SELECT`genre`.`genre`,`genre`.`id`  
        FROM `genre`;");

        $query->execute();

        $genres = $query->fetchAll();

        return $genres;
    }

    public function addNewGame(
        string $name,
        string $franchise,
        float $price,
        int $genre_id
    ) {
        $query = $this->db->prepare("
    INSERT INTO `games` (`name`, `franchise`, `price`, `genre_id`)
    VALUES (:name, :franchise, :price, :genre_id);
    ");
        $success = $query->execute([
            'name' => $name,
            'franchise' => $franchise,
            'price' => $price,
            'genre_id' => $genre_id
        ]);
        if (!$success) {
            return false;
        }
    }
}
