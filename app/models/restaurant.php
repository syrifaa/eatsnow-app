<?php
require_once 'app/core/db.php';

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
        $query = "SELECT * FROM $this->table ORDER BY resto_name $order";
        return $this->db->execute($query);
    }

    public function sortRestaurantByRating($order)
    {
        $query = "SELECT * FROM $this->table ORDER BY resto_rating $order";
        return $this->db->execute($query);
    }

    public function filterRestaurantByRating($rating)
    {
        $query = "SELECT * FROM $this->table WHERE resto_rating >= $rating";
        return $this->db->execute($query);
    }

    public function filterRestaurantByPrice($price)
    {
        $query = "SELECT * FROM $this->table WHERE resto_price <= $price";
        return $this->db->execute($query);
    }
}
