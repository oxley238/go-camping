<?php

namespace view;

class View {

    function __construct() {
        
    }

    function header() {
        include 'includes/header.php';
    }

    
abstract function body();

    function footer() {
        include 'includes/footer.php';
    }

    function page() {
        $this->header();
        $this->body();
        $this->footer();
    }

}

//implement all abstract methods
//view-class for each page