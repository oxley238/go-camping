<?php

class Categories {

    // private $categories = null;
    private $resultset = null;
    private $row;

    public function __construct() {

        try {
            $database = "go-camping";
            $username = "root";
            $password = "";

// connect to database
            $db = new PDO("mysql:host=localhost;dbname=$database", $username, $password);

//define query
            $query = "SELECT id, name,url FROM categories";

//execute query and returns a PDOStatement object
            $this->resultset = $db->query($query);

            //     $this->categories = $resultset->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getCategories() {
        return $this->categories;
    }

    public function next() {
        $this->row = $this->resultset->fetch(PDO::FETCH_ASSOC);
        return $this->row;
    }

    public function getName() {
        return $this->row['name'];
    }

    public function getId() {
        return $this->row['id'];
    }

    public function getUrl() {
        return $this->row['url'];
    }

}
