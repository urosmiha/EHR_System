<?php

    // echo "Helper";

    // Adds specified user data to the user table
    function addUser($hpi, $first, $last, $hsc, $psw, $conn) {
        $hash_psw = password_hash($psw, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (hpi, first, last, hsc, psw) VALUES ('$hpi', '$first', '$last', '$hsc', '$hash_psw');";
        $result = mysqli_query($conn, $sql);
    }
    
    // Add specified data to questions table
    //  For now do not encrypt data just store it as it is ******* TODO LATER *****************************
    function addQuestion($qid, $hsc, $topic, $title, $content, $user, $likes, $status, $date, $conn) {
        $sql = "INSERT INTO questions (qid, hsc, topic, title, content, user, likes, status, date) VALUES ('$qid', '$hsc', '$topic', '$title', '$content', '$user', '$likes', '$status', '$date');";
        $result = mysqli_query($conn, $sql);
    }

    // Return the practice pased in the Health Sector Code
    function lookUpTopic($hsc) {
        switch ($hsc) {
            case "G01":
                return "General Practice";
                break;
            case "D40":
                return "Physiotherapy";
                break;
            case "M10":
                return "Cardionlogy";
                break;
            case "M15":
                return "Dermatology";
            break;
            case "M45":
                return "Neurology";
            break;
            case "M50":
                return "Oncology";
            break;

            default:
                return "General Practice";
        } 
    }