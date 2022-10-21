<?php


class Database
{
    private $serverName;
    private $userName;
    private $password;
    private $dbName;
    private $conn;


    function __construct($dbName)
    {
        $this->serverName = "localhost";
        $this->userName = "root";
        $this->password = "";
        $this->dbName = $dbName;
        $this->conn = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function get_conn(){
        return $this->conn;
    }


    public function close_conn()
    {
        $this->conn->close();
    }
}
