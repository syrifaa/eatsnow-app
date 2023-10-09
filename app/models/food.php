<?php

class Food {
    private $table = 'Food';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getFood($resto_id)
    {
        $query = "SELECT * FROM $this->table WHERE resto_id = $resto_id";
        return $this->db->execute($query);
    }
}