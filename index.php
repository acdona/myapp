<?php
    // Starts a new session.
    session_start();
    
    // Clears the buffer and switches any output to the browser.
    ob_start();
    
    // Defines a security key for all pages of the project.
    //define('123456', true);

    // Loads the autload
    require './vendor/autoload.php';
    
    // Assing a class route nickname
    use Core\ConfigController as Home;
    
    // Instantiates the ConfigController class
    $url = new Home();
    
    // Instantiate the method
    $url->load();


?>