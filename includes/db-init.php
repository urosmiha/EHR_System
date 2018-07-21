<?php

    /*
    * MAIN CODE:
    */

    include_once 'dbh.php';
    initUsers($conn);
    initQuestions($conn);


    // =====================================
    /*
     * Functions:
    */

    // Adds specified user data to the user table
    function addData($hpi, $first, $last, $hsc, $psw, $conn) {
        
        $hash_psw = password_hash($psw, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (hpi, first, last, hsc, psw) VALUES ('$hpi', '$first', '$last', '$hsc', '$hash_psw');";
        $result = mysqli_query($conn, $sql);
    }

    // Add bunch of random users
    function initUsers($conn) {
            // Check if the table exists
        $sql = "SELECT * FROM information_schema.tables WHERE table_schema = 'ehr_db' AND table_name = 'users' LIMIT 1;";
        $result = mysqli_query($conn, $sql);
        $result_check = mysqli_num_rows($result);    // Check if there is any result from the query
        
        //  If table does not exist
        if($result_check < 1) {
            /* Create a new one. Index guide:
            * hpi - Health Provider Identifier must be 16 digits long.
            * first - First name
            * last - Last name
            * hsc - Health Speciality Code based on real NZ code: https://www.health.govt.nz/nz-health-statistics/data-references/code-tables/common-code-tables/health-specialty-code-table
            * psw - Password for login
            */
            $sql = "CREATE TABLE IF NOT EXISTS users(id int(11) not null AUTO_INCREMENT PRIMARY KEY, hpi varchar(16) not null, first varchar(255) not null, last varchar(255) not null, hsc varchar(255) not null, psw varchar(255) not null);";
            $result = mysqli_query($conn, $sql);

            /* *** NOTE: Since this is for demonstrational purpose only, and we want to create many accounts the process has been automated
                and everything is entered as shown below. In a real application this should be done through sigup form, but we wanted to save time.
                Password is still hashed in database.
            */
            // We could have had a random string and number generator but this way it is easier to login with users if we know exactly which passowrd and HPI to use.
            // Add data to the table
            addData("9999999999999999", "Admin", "Admin", "G00", "root", $conn);
            addData("8144263845012816", "John", "Smith", "G01", "D0oeyr", $conn); 
            addData("2784314725024840", "Louis", "Barnett", "G01", "C1uSxm", $conn); 
            addData("7213371884361708", "Agnes", "Bennett", "D40", "sdT0Tp", $conn); 
            addData("0059733480442287", "Alice", "Bush", "G01", "M7GcxU", $conn); 
            addData("7985433055533216", "Margaret", "Cruickshank", "G01", "zV0467", $conn); 
            addData("1885596723202265", "Charles", "Farthing", "G01", "xK3S33", $conn); 
            addData("9199387168431627", "Isaac", "Featherston", "G01", "iM4WPA", $conn); 
            addData("9308606653138318", "Erich", "Geiringer", "G01", "ScbC48", $conn); 
            addData("5003179885770554", "David", "Gerrard", "G01", "te5UgK", $conn); 
            addData("6190510160717766", "Harold", "Gillies", "G01", "cW40H1", $conn); 
            addData("4666029279298446", "Herb", "Green", "G01", "dYEf3o", $conn); 
            addData("8089930693201074", "Elizabeth", "Gunn", "M10", "14YanP", $conn); 
            addData("1800315856145240", "Ian", "Hassall", "M10", "sO00oJ", $conn); 
            addData("4145907651023999", "Fred", "Hollows", "M10", "SK2vbB", $conn); 
            addData("1768404315200940", "Paul", "Hutchison", "M10", "7iNHlW", $conn); 
            addData("8434160307830941", "Tracy", "Inglis", "M10", "T8aa5v", $conn); 
            addData("9459173006109210", "Truby", "King", "M10", "8zRB3U", $conn); 
            addData("0861208656055662", "Ivan", "Lichter", "M15", "L1Fs4x", $conn); 
            addData("3704251424826610", "Archibald", "McIndoe", "M15", "fyW97a", $conn); 
            addData("3851215999088013", "Tracy", "Nedwill", "M15", "nY9Z4e", $conn);
            addData("6054918944115923", "Archibald", "McIndoe", "M15", "p2C0Gm", $conn); 
            addData("9972007019597607", "Brad", "McKay", "M15", "ZtXz4L", $conn); 
            addData("6701270700133987", "Courtney", "Rogers", "M15", "5vLLyJ", $conn); 
            addData("9347513593592194", "Denis", "Rogers", "M45", "VNsf0h", $conn); 
            addData("1267526751444866", "Edward", "Sayers", "M45", "Ffcj6a", $conn); 
            addData("3825608702780785", "Henry", "Thacker", "M45", "gnK1Zx", $conn); 
            addData("3653765101474740", "Ronald", "Trubuhovich", "M45", "F1l8dq", $conn); 
            addData("5834067021308404", "Thomas", "Valintine", "M50", "3iCcSB", $conn); 
            addData("2796629485280519", "Leslie", "Whetter", "M50", "7bL54B", $conn); 
            addData("8102019473634893", "Christine", "Winterbourn", "M50", "3Vh5Dp", $conn);  
        }
    }

    // Add specified data to questions table
    //  For now do not encrypt data just store it as it is ******* TODO LATER *****************************
    function addQuestion($qid, $hrc, $topic, $title, $content, $user, $likes, $status, $conn) {
        $sql = "INSERT INTO questions (qid, hsc, topic, title, content, user, likes, status) VALUES ('$qid', '$hrc', '$topic', '$title', '$content', '$user', '$likes', '$status');";
        $result = mysqli_query($conn, $sql);
    }

    // Add some random questions so we can have something to show.
    function initQuestions($conn) {

        $sql = "SELECT * FROM information_schema.tables WHERE table_schema = 'ehr_db' AND table_name = 'questions' LIMIT 1;";
        $result = mysqli_query($conn, $sql);
        $result_check = mysqli_num_rows($result);    // Check if there is any result from the query

        //  If table does not exist
        if($result_check < 1) {

            /* Create a new one. Index guide:
            *   qid - Unique id of the question = HSC + user HPI + question number
            *   hsc - Health Specialization Code in this case represents a topic of the question
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
            */
            $sql = "CREATE TABLE IF NOT EXISTS questions (id int(11) not null AUTO_INCREMENT PRIMARY KEY, qid varchar(25) not null, hsc varchar(255) not null, topic varchar(255) not null, title varchar(255) not null, content varchar(255) not null, user varchar(16) not null, likes int(11) not null, status varchar(20) not null);";
            $result = mysqli_query($conn, $sql);

            // Add random questions just so there is something to display
            // Topics aquired from: https://www.healthcaremagic.com/topics
        // 1
            $title = "Patient has been experiencing this nagging pain in their left lower stomach for the past week";
            $content = "It is located down below their belly button. It seems to be fairly constant and makes it difficult to concentrate on their work or anything else. 
                        It has even interfered with their sleep. They have never had a pain that lasted this long before. 
                        I do not think it is a pulled muscle in my stomach. 
                        I prescribed 3 Advil tablets this morning and it did help some. 
                        What do you think this is?";
            $qid = "G010059733480442287001";

            addQuestion($qid, "G01", "General Practice", $title, $content, "0059733480442287", 5, "open", $conn);
        // 2
            $title = "Is Benadryl effective in the treatment of asthma and chest pain?";
            $content = "Patient complained that pollen plus other thing in the air are really getting to them and making it hard to breath. 
                        I am almost positive it is from allergies but for the last four days they have not been able to take a full breath and today has been terrible,
                        their chest hurts and they are getting dizzy and shaky from it. Will Benadryl Help this? I have tried suggesting inhaler but it’s not helping at all. ";
            $qid = "G010059733480442287002";

            addQuestion($qid, "G01", "General Practice",  $title, $content, "0059733480442287", 15, "open", $conn);

        // 3
            $title = "Can a cortisol reducer be taken while on Escitalopram?";
            $content = "Should patient take Canthe cortisol reducer (contains ashwaganda 100 mg, relora 100 mg, l-theanine 100 mg, magnesium 50 mg, phosphatidyl serine 50 mg) at 5pm 
                        while taking escitalopram 10 mg at breakfast for anxiety & depression for a month now. 
                        I want to try cortisol reducer to make them sleep because they have difficulty falling asleep & maintain asleep due to racing thoughts. 
                        I am taking trazodone 25 mg to help them sleep at night but I want to stop it & just sugested naturopathic supplements such as cortisol reducer if it will help them sleep. ";
            $qid = "G012784314725024840001";

            addQuestion($qid, "G01", "General Practice",  $title, $content, "2784314725024840", 22, "open", $conn);

        // 4
            $title = "Suggest treatment for pain after knee replacement.";
            $content = "After a knee replacement my patient is in severe pain - oxycodone/acetaminophen 10/325mlg & Carisoprodol (Soma) 350mlg is not touching the pain. 
                        Can she double the oxy? She is a larger size & maybe the dosage is not enough?"; 
            $qid = "D407213371884361708001";

            addQuestion($qid, "D40", "Physiotherapy",  $title, $content, "7213371884361708", 7, "open", $conn);
        }
    }

    