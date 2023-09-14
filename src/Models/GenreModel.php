<?php

namespace GameCollection\Models;

use PDO;

class GenreModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function getAllGenres()
    {
        $query = $this->db->prepare("SELECT`genre`.`genre`,`genre`.`id`  
        FROM `genre`;");

        $query->execute();

        $genres = $query->fetchAll();

        return $genres;
    }
}
