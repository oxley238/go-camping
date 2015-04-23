<?php


namespace Model {

use PDO;
use PDOException;

class Model {
    
    private $resultset = null;
    private $row;
    private $db;
    
    public function __construct() {
        try{
        $database = "go-camping";
        $username = "root";
        $password = "";

// connect to database
        $this->db = new PDO("mysql:host=localhost;dbname=$database", $username, $password);
               
        }catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    
    public function query($query)
    {
       $this->resultset =  $this->db->query($query);
    }
    
    public function next()
    {
        $this->row = $this->resultset->fetch(PDO::FETCH_ASSOC);
        return $this->row;
    }

    public function get($column)
    {
        return $this->row[$column];
    }
    
}
