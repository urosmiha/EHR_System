<?php
    // include 'view/header.html';
    // include 'view/main.html';
    session_start();

    include 'includes/db-init.php';

    // If user is logged in then go straight to the main page
    if(isset($_SESSION['hpi'])) {
        header("Location: main.php");
        exit();
    }
    else { // If user is not logged in then direct them to login page
        include 'view/login.html';
    }
    

