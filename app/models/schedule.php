<?php

class Schedule {
    private $table = 'schedule';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSchedules()
    {
        $query = "SELECT * FROM $this->table";
        return $this->db->execute($query);
    }
    
    public function getSchedule($id)
    {
        $query = "SELECT * FROM $this->table WHERE resto_id = $id";
        return $this->db->execute($query);
    }

    public function getScheduleByName($name)
    {
        $query = "SELECT * FROM $this->table WHERE resto_name = '$name'";
        return $this->db->execute($query);
    }
}

?>