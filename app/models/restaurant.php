<?php
require_once (__DIR__.'../../core/db.php');

class Restaurant {
    private $table = 'restaurant';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllRestaurants()
    {
        $query = "SELECT * FROM $this->table";
        return $this->db->execute($query);
        
    }

    public function getRestaurant($id)
    {
        $query = "SELECT * FROM $this->table WHERE resto_id = $id";
        return $this->db->execute($query);
    }

    public function getRestaurantByName($name)
    {
        $query = "SELECT * FROM $this->table WHERE resto_name = '$name'";
        return $this->db->execute($query);
    }


    public function sortRestaurantByName($order)
    {
        $query = " ORDER BY resto_name $order";
        return $query;
    }

    public function sortRestaurantByRating($order)
    {
        $query = " ORDER BY rating $order";
        return $query;
    }

    public function filterRestaurantByRating($rating)
    {
        $query = " WHERE rating >= $rating";
        return $query;
    }

    public function filterRestaurantByPrice($price)
    {
        $query = "SELECT * FROM $this->table WHERE resto_price <= $price";
        return $this->db->execute($query);
    }

    public function filterRestaurantByCategory($category)
    {
        $query = " WHERE category = '$category'";
        return $query;
    }

    public function execute($query)
    {
        return $this->db->execute($query);
    }

    public function insertRestaurant($resto_name, $resto_desc, $address, $rating, $img_path, $vid_path, $category) {
        $query = "INSERT INTO $this->table (resto_name, resto_desc, address, rating, img_path, vid_path, category) VALUES ('$resto_name', '$resto_desc', '$address', $rating, '$img_path', '$vid_path', '$category')";
        $this->db->execute($query);
    }

    public function deleteRestaurant($id) {
        $query = "DELETE FROM $this->table WHERE resto_id = $id";
        return $this->db->execute($query);
    }

    public function getLastID() {
        $query = "SELECT MAX(resto_id) AS resto_id FROM $this->table";
        return $this->db->execute($query);
    }
}

