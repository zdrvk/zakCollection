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
    public function getAllGames(bool $deleted): array
    {
        if ($deleted) {
            $queryDeleted = 1;
        } else {
            $queryDeleted = 0;
        }
        $query = $this->db->prepare("SELECT `games`.`id`,
        `games`.`name`,
        `games`.`franchise`,
        `games`.`price`,
        `games`.`deleted`,
        `genre`.`genre`
        FROM `games`
            INNER JOIN `genre`
             ON `games`.`genre_id` = `genre`.`id`
             WHERE `deleted` = $queryDeleted ");

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

    public function toggleGameStatus($id, $deleted): bool
    {
        $setDeleted = ($deleted == 1) ? 0 : 1;

        $query = $this->db->prepare("UPDATE `games` SET `games`.`deleted` = :setDeleted WHERE `games`.`id` = :id");

        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':setDeleted', $setDeleted, PDO::PARAM_INT);

        $success = $query->execute();

        return $success;
    }
}
