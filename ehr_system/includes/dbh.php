<?php   

    // Make sure to include this file in all files you want to use dabase.

    // Since we are using XAMPP:
    $dbServerName = "localhost";    // We are hosting out application on the localhost
    $dbUserName = "root";           // We are running s server with root privelages
    $dbPassword = "";               // Therefore the is no password
    $dbName = "ehr_db";
    // Create connectiont to database
    $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);


