<?php

    /*
    * MAIN CODE:
    */

    include_once 'dbh.php';
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
        // Add data to the table
        addData("8144263845012816", "John", "Smith", "M15", "D0oeyr", $conn); 
        addData("2784314725024840", "Louis", "Barnett", "M15", "C1uSxm", $conn); 
        addData("7213371884361708", "Agnes", "Bennett", "M15", "sdT0Tp", $conn); 
        addData("0059733480442287", "Alice", "Bush", "M15", "M7GcxU", $conn); 
        addData("7985433055533216", "Margaret", "Cruickshank", "M15", "zV0467", $conn); 
        addData("1885596723202265", "Charles", "Farthing", "M15", "xK3S33", $conn); 
        addData("9199387168431627", "Isaac", "Featherston", "M15", "iM4WPA", $conn); 
        addData("9308606653138318", "Erich", "Geiringer", "M15", "ScbC48", $conn); 
        addData("5003179885770554", "David", "Gerrard", "M15", "te5UgK", $conn); 
        addData("6190510160717766", "Harold", "Gillies", "M15", "cW40H1", $conn); 
        addData("4666029279298446", "Herb", "Green", "M15", "dYEf3o", $conn); 
        addData("8089930693201074", "Elizabeth", "Gunn", "M15", "14YanP", $conn); 
        addData("1800315856145240", "Ian", "Hassall", "M15", "sO00oJ", $conn); 
        addData("4145907651023999", "Fred", "Hollows", "M15", "SK2vbB", $conn); 
        addData("1768404315200940", "Paul", "Hutchison", "M15", "7iNHlW", $conn); 
        addData("8434160307830941", "Tracy", "Inglis", "M15", "T8aa5v", $conn); 
        addData("9459173006109210", "Truby", "King", "M15", "8zRB3U", $conn); 
        addData("0861208656055662", "Ivan", "Lichter", "M15", "L1Fs4x", $conn); 
        addData("3704251424826610", "Archibald", "McIndoe", "M15", "fyW97a", $conn); 
        addData("3851215999088013", "Tracy", "Nedwill", "M15", "nY9Z4e", $conn);
        addData("6054918944115923", "Archibald", "McIndoe", "M15", "p2C0Gm", $conn); 
        addData("9972007019597607", "Brad", "McKay", "M15", "ZtXz4L", $conn); 
        addData("6701270700133987", "Courtney", "Rogers", "M15", "5vLLyJ", $conn); 
        addData("9347513593592194", "Denis", "Rogers", "M15", "VNsf0h", $conn); 
        addData("1267526751444866", "Edward", "Sayers", "M15", "Ffcj6a", $conn); 
        addData("3825608702780785", "Henry", "Thacker", "M15", "gnK1Zx", $conn); 
        addData("3653765101474740", "Ronald", "Trubuhovich", "M15", "F1l8dq", $conn); 
        addData("5834067021308404", "Thomas", "Valintine", "M15", "3iCcSB", $conn); 
        addData("2796629485280519", "Leslie", "Whetter", "M15", "7bL54B", $conn); 
        addData("8102019473634893", "Christine", "Winterbourn", "M15", "3Vh5Dp", $conn);  
    }

    // =====================================
    /*
     * Functions:
    */

    function addData($hpi, $first, $last, $hsc, $psw, $conn) {
        
        $hash_psw = password_hash($psw, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (hpi, first, last, hsc, psw) VALUES ('$hpi', '$first', '$last', '$hsc', '$hash_psw');";
        $result = mysqli_query($conn, $sql);
    }



    