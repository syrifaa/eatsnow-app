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

    public function insertSchedule($data){
        $query = "INSERT INTO $this->table (resto_id, day, open_time, close_time) VALUES ($data[resto_id], '$data[day]', '$data[open_time]', '$data[close_time]')";
        return $query;
    }

    public function insertScheduleToResto($resto_id, $schedule_id) {
        $query = "UPDATE $this->table SET resto_id = $resto_id WHERE schedule_id is NULL";
        return $query;
    }
}

?>