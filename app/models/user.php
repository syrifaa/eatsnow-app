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

    public function updateUser($previousemail, $name, $email, $password, $profile_img) {
        $query = "UPDATE $this->table SET user_name = '$name', email = '$email', password = '$password', profile_img = '$profile_img'  WHERE email = '$previousemail'";
        $this->database->execute($query);
    }
}
?>