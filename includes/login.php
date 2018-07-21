<?php

    session_start();

    // If user click on sigin button continue
    if(isset($_POST['login_btn'])) {
        
        include 'dbh.php';

        // $hpi = mysqli_real_escape_string($conn, $_POST['hpi']);
        // $pwd = mysqli_real_escape_string($conn, $_POST['psw']);
        
        $hpi = $_POST['hpi'];
        $psw = $_POST['psw'];

        // echo $hpi."<hr>";
        // echo $psw."<hr>";

        // echo empty($hpi)."<hr>";
        // echo empty($psw);

        // user must input some hpi value and it must be 16 characters long.
        if(empty($hpi) || strlen($hpi) != 16) {
            header("Location: ../index.php?login=emptyhip");
            exit();
        }
        else {
            // Check if use has entered the password
            if(empty($psw)) {
                header("Location: ../index.php?login=emptypsw");
                exit();
            }
            else {
                $sql = "SELECT * FROM users WHERE hpi='$hpi';";
                $result = mysqli_query($conn, $sql);
                $result_check = mysqli_num_rows($result);
                // If hpi does not exist in database go back to main
                if($result_check < 1) {
                    header("Location: ../main.php?login=wronghpi");
                    exit();    
                } else {
                    // Check if password matches the username
                    if($row = mysqli_fetch_assoc($result)) {
                        $dehash_psw_check = password_verify($psw, $row['psw']);
                        if($dehash_psw_check == false) {
                            header("Location: ../index.php?login=wrongpsw");
                            exit();
                        }
                        elseif($dehash_psw_check == true) {
                            // Log user session
                            $_SESSION['hpi'] = $row['hpi'];
                            $_SESSION['first'] = $row['first'];
                            $_SESSION['last'] = $row['last'];
                            $_SESSION['hsc'] = $row['hsc'];
                            header("Location: ../main.php?login=success");
                            exit();
                        }
                    }
                }

                // header("Location: ../main.php?login=success");
                // exit();
            }

            
        }
        
        // header("Location: ../main.php?login=success");
        // exit();
    } 
    else {
        header("Location: ../index.php");
        exit();
    }
