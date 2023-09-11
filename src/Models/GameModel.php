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
    public function getAllGames()
    {
        $query = $this->db->prepare("SELECT *
        FROM `games`
            INNER JOIN `genre`
             ON `games`.`genre_id` = `genre`.`id`");

        $query->execute();

        $data = $query->fetchAll();

        $games = [];

        foreach ($data as $game) {

            $games[] = new Game(

                $game['name'],
                $game['franchise'],
                $game['price'],
                $game['genre_id'],
                $game['genre']
            );
        }

        return $games;
    }
}
