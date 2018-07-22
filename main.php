<?php
    include 'includes/helper-functions.php';
    session_start();    // Start session for every page that we want user to stay logged in on
    
    if(isset($_SESSION['hpi'])) {
        include 'view/main.html';

        include 'includes/dbh.php';

        $hsc = $_SESSION['hsc'];
        echo $hsc."<br>";

        if($_SESSION['hsc'] == "G00") {
            $sql = "SELECT * FROM questions;"; // Admin should be able to see all the questions
        }
        else { 
            $sql = "SELECT * FROM questions WHERE hsc='$hsc';"; // Select all questions that user can see based on their hsc
        }
        
        if($result = mysqli_query($conn, $sql)) {

            $qcount = 0;
            while($row = mysqli_fetch_assoc($result)) {
                $title = $row['title'];
                $content = $row['content'];

                echo "<h3>".$title."</h3>";
                echo "<p>".$content."</p>";
                echo "<hr>";

                $qcount++;  // Total number of questions, used later on in creating a new question
            }
            mysqli_free_result($result);
        } 
        else {
            echo "No questions on this topic";
        }

        // ---------------
        // Create new post
        if(isset($_POST['publish'])) {

            $title = $_POST['title'];
            $content = $_POST['content'];

            if(empty($title)) {
                echo "Please enter the title";
            }
            else {
                /* Create a new question. Index guide:
                *   qid - Unique id of the question = HSC + user HPI + question number
                *   hsc - Health Specialization Code in this case represents a topic of the question
                *   topic - which topic the question belong to
                *   title 
                *   content - Question
                *   user - HPI of the user which is asking a question
                *   likes - How many people think this is a good question
                *   status: 
                        open - question is still ongoing
                        closed - question has been answered and there are no more discussions
                        hidden - from all other users, only visible to op.
                        admin-hidden - only admin can see the question
                        reported - someone thinks the question is inapropriate so it must be reviewed. Also hidden from everyone but op.
                    date - time of the post
                */
                $qid = $_SESSION['hsc'].$_SESSION['hpi'].$qcount;   // Concantinate the values to get the unique question is
                $hsc = $_SESSION['hsc'];
                $topic = lookUpTopic($hsc);
                $user = $_SESSION['hpi'];
                $likes = 0;                 // Initially no likes
                $status = "open";           // Initially status is open
                $date = date("Y/m/d");

                addQuestion($qid, $hsc, $topic, $title, $content, $user, $likes, $status, $date, $conn);
                // Refresh the page so new question can be seen
                header("Location: main.php");
                exit();

            }
        }
    }
    else {
        header("Location: view/unauth.html");
        exit();
    }

    // Check if user wants to logout
    if(isset($_POST['logout_btn'])) {
        session_destroy();
        header("Location: index.php");
        exit();
    }

