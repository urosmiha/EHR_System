<?php
// Check if the button was pressed
    if(isset($_POST['submit'])) {
        include_once 'includes/dbh.php';

        // $first = mysqli_real_escape_string($conn, $_POST['first']);
        // $last = mysqli_real_escape_string($conn, $_POST['last']);
        // $email = mysqli_real_escape_string($conn, $_POST['email']);
        // $username = mysqli_real_escape_string($conn, $_POST['username']);
        // $uid = mysqli_real_escape_string($conn, $_POST['uid']);
        // $psw = mysqli_real_escape_string($conn, $_POST['psw']);
        // $psw2 = mysqli_real_escape_string($conn, $_POST['psw2']);
        // $priv = mysqli_real_escape_string($conn, $_POST['privelage']);
        // $priv_time = mysqli_real_escape_string($conn, $_POST['privelage_time']);

        $first = $_POST['first'];
        $last = $_POST['last'];
        $email = $_POST['email'];
        $username =  $_POST['username'];
        $uid = $_POST['uid'];
        $psw = $_POST['psw'];
        $psw2 = $_POST['psw2'];
        $priv = $_POST['privelage'];
        $priv_time = $_POST['privelage_time'];

        // echo $first

        // Check for empty fields
        if(empty($first) || empty($last)) {//|| empty($email) || empty($username) || empty($uid) || empty($psw) || empty($psw2) || empty($priv) || empty($priv_time)) {
            // echo "shit";
            header("Location: ../signup.php?signup=empty");
            exit();
        }
        else {
            // Check if first and last name format is valid
            if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
                header("Location: ../signup.php?signup=invalid");
                exit();
            }
            else {
                header("Location: ../signup.php?signup=success");
                exit();
                // // Check if email format is valid
                // if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                //     header("Location: ../signup.php?signup=invalidemail");
                //     exit();
                // } else {
                //     // Check if the useraname is already taken
                //     $sql = "SELCET * FROM users WHERE username='$username'";
                //     $result = mysqli_query($conn, $sql);
                //     $result_check = mysql_num_rows($result);    // Check if there is any result from the query

                //     if($result_check > 0) {
                //         header("Location: ../signup.php?signup=usertaken");
                //         exit();
                //     }
                //     else {
                //         // Check if ID is entered properly (i.e. only numbers and letters)
                //         if(!preg_match("/^[a-zA-Z0-9]*$/", $uid)) {
                //             header("Location: ../signup.php?signup=invalidID");
                //             exit();
                //         }
                //         else {
                //             // Check if ID already exists
                //             $sql = "SELCET * FROM users WHERE user_id='$uid'";
                //             $result = mysqli_query($conn, $sql);
                //             $result_check = mysql_num_rows($result);    // Check if there is any result from the query
                //             // If there are results that means ID is already taken
                //             if($result_check > 0) {
                //                 header("Location: ../signup.php?signup=IDtaken");
                //                 exit();
                //             }
                //             else {
                //                 // Check if passwords match
                //                 if($psw != $psw2) {
                //                     header("Location: ../signup.php?signup=nomatch");
                //                     exit();
                //                 }
                //                 else {
                //                     if(!preg_match("/^[a-zA-Z]*$/", $priv)) {
                //                         header("Location: ../signup.php?signup=nopriv");
                //                         exit();
                //                     }
                //                     else {
                //                         if(!preg_match("/^[0-9]*$/", $priv_time)) {
                //                             header("Location: ../signup.php?signup=noprivtime");
                //                             exit();
                //                         }
                //                         else {
                //                             // Hash passwords
                //                             $hashedPsw = password_hash($psw, PASSWORD_DEFAULT);
                //                             // Insert the user into database
                //                             $sql = "INSERT INTO users(user_id, user_first, user_last, user_email, username, user_psw, user_priv, user_priv_time) VALUES ('$user_id', '$first', '$last', '$email', '$psw', '$priv', '$priv_time')";
                //                             $result = mysqli_query($conn, $sql);
                //                             echo "<hr>".$result."<hr>";
                //                             // header("Location: ../signup.php?signup=success");
                //                             // exit();
                //                         }
                //                     }
                //                 }
                //             }
                //         }
                //     }
                // }
                
            }
        }


    } 
    else {
        header("Location: ../signup.php");
        exit();
    }