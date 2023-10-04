<?php 
class User{
    private $table = 'user';
    private $database;

    public function __construct(){
        $this->database = new database;
    }

    public function createUser($name, $email, $password){
        $query = "INSERT INTO $this->table (user_name, email, password) VALUES ('$name', '$email', '$password')";
        $this->database->execute($query);
    }

    public function fetchAccount($email){
        $query = "SELECT * FROM $this->table WHERE email = '$email'";
        return $this->database->execute($query);
    }
}
?>