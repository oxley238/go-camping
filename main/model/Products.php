<?php

class Products {

    private $categoryName;
    private $resultset = null;
    private $row;

    public function __construct($id) {
        try {
            $database = "go-camping";
            $username = "root";
            $password = "";

// connect to database
            $db = new PDO("mysql:host=localhost;dbname=$database", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//define query
            $query = "SELECT name from categories where id = " . $id;

//execute query and returns a PDOStatement object
            $resultset = $db->query($query);

            $category = $resultset->fetch(PDO::FETCH_ASSOC);

            $this->categoryName = $category['name'];

//define query
            $query = "SELECT id, name,images from products where category_id = " . $id;

//execute query and returns a PDOStatement object
            $this->resultset = $db->query($query);
            
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function next() {
        $this->row = $this->resultset->fetch(PDO::FETCH_ASSOC);
        return $this->row;
    }

    public function getCatgeoryName()
    {
        return $this->categoryName;
    }
    
    
    public function getId() {
        return $this->row['id'];
    }

    public function getName() {
        return $this->row['name'];
    }

    public function getImage() {
        return $this->row['images'];
    }

}
