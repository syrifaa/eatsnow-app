<?php

require_once (__DIR__.'../../core/db.php');

class Food {
    private $table = 'food';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllFood($resto_id)
    {
        $query = "SELECT * FROM $this->table WHERE resto_id = $resto_id";
        return $this->db->execute($query);
    }

    public function insertFood($name, $desc, $price, $imgpath) {
        $query = "INSERT INTO $this->table (food_name, food_desc, price, img_path) VALUES ('$name', '$desc', $price, '$imgpath')";
        return $query;
    }

    public function updateFood($id, $name, $desc, $price, $imgpath) {
        $query = "UPDATE $this->table SET food_name = '$name', food_desc = '$desc', price = $price, img_path = '$imgpath' WHERE food_id = $id";
        return $query;
    }

    public function deleteFood($id) {
        $query = "DELETE FROM $this->table WHERE food_id = $id";
        return $query;
    }

    public function getFood() {
        $query = "SELECT * FROM $this->table WHERE resto_id is NULL";
        return $this->db->execute($query);
    }

    public function getIDFood() {
        $query = "SELECT food_id FROM $this->table WHERE resto_id is NULL";
        return $this->db->execute($query);
    }

    public function getFoodById($id) {
        $query = "SELECT * FROM $this->table WHERE food_id = $id";
        return $this->db->execute($query);
    }

    public function insertFoodToResto($resto_id) {
        $query = "UPDATE $this->table SET resto_id = $resto_id WHERE resto_id is NULL";
        return $this->db->execute($query);
    }
}