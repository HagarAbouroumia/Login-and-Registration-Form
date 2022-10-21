<?php


class Department{
    private $title;
    private $description;
    private $conn;

    public function __construct($conn)
    {      
        $this->conn = $conn;
    }

    public function get_all_departments(){        
        $query = "SELECT * from department ;";            
        $result = $this->conn->query($query);    
        return $result;
    }
}
