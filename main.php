<?php
    session_start();    // Start session for every page that we want user to stay logged in on
    
    if(isset($_SESSION['hpi'])) {
        include 'view/main.html';
    }
    else {
        header("Location: view/unauth.html");
        exit();
    }

    if(isset($_POST['logout_btn'])) {
        session_destroy();
        header("Location: index.php");
        exit();
    }
