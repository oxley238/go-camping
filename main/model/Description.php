<?php

class Description {

    private $resultset = null;
    private $row;

    public function __construct($id) {
        try {
            $database = "go-camping";
            $username = "root";
            $password = "";

// connect to database
            $db = new PDO("mysql:host=localhost;dbname=$database", $username, $password);

//define query
            $query = "SELECT id, name,images,price,description from products where id = " . $id;

//execute query and returns a PDOStatement object
            $this->resultset = $db->query($query);
            
            $this->next();
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function next() {
        $this->row = $this->resultset->fetch(PDO::FETCH_ASSOC);
        return $this->row;
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

    public function getPrice() {
        return $this->row['price'];
    }

    public function getDescription() {
        return $this->row['description'];
    }

}
