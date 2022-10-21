<?php

class User
{
    private $conn;
    private $id;
    private $mail;
    private $name;
    private $password;
    private $registration_date;

    public function __construct($conn)
    {

        $this->conn = $conn;
    }

    public function insert($mail, $name, $password){
        $this->mail = $mail;
        $this->name = $name;
        $this->password = $password;
    }

    public function check_exist($mail){
        $query = "SELECT * from user where mail='" . $mail . "';";
        $result = $this->conn->query($query);
        if (mysqli_num_rows($result) > 0) {
            return true;
        } 
        return false;
    }

    public function get_fields($mail){
        $query = "SELECT * from user where mail='" .$mail. "';";
        $result = $this->conn->query($query);
        $row = $result->fetch_assoc();
        $this->id = $row["id"];
        $this->name = $row["name"];
        $this->mail = $row["mail"];
        $this->registration_date = $row["registration_date"];
    }

    public function validate($mail,$password){
        $query = "SELECT mail,password FROM user;";
        $result = $this->conn->query($query);
        $row = $result->fetch_assoc();
        if($row['mail'] == $mail and $row['password'] == $password){
            return true;
        }
        return false;
    }
    
    private function get_field(){
        $query = "SELECT * from user where mail='" . $_POST['mail'] . "';";
        $result = $this->conn->query($query);
        $row = $result->fetch_assoc();
        $this->id = $row['id'];
        $this->registration_date = $row['registration_date'];
    }

    public function create()
    {
        $sql = "INSERT INTO user (mail, name, password)
        VALUES ('" . $_POST["mail"] . "','" . $_POST["name"] . "','" . $_POST["password"] . "')";
        $this->conn->query($sql);
        $this->get_field();

    }

    public function get_id(){
        return $this->id;
    }
    public function get_name(){
        return $this->name;
    }
    public function get_mail(){
        return $this->mail;
    }
    public function get_registration_date(){
        return $this->registration_date;
    }
}
