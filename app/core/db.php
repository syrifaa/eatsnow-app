<?php
    class Database{
      private $conn;
      private $statement;
      
        public function __construct(){
            $this->conn = mysqli_connect("db", "user", "password", "eatsnow");
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }

        public function execute($query){
            return mysqli_query($this->conn, $query);
        }

        public function selectAll($table){
            $query = "SELECT * FROM $table";
            $result = $this->execute($query);
            $data = [];
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
            return $data;
        }

        public function selectOne($table, $id){
            $query = "SELECT * FROM $table WHERE id = $id";
            $result = $this->execute($query);
            return mysqli_fetch_assoc($result);
        }
    
    }
?>