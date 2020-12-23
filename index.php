<?php
    require("config.php");
    $action = isset($_GET['action']) ? $_GET['action'] : "";
    
    switch($action) {
        default;
        homepage();
    }


    function homepage() {
        $results = array();
        $results['pageTitle'] = "Music Player";
        require(TEMPLATE_PATH."/homepage.php");    
    }
?>
