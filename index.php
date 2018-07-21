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
        // $status = $_GET['login'];
        // echo "Status: ".$status;
    }


    // //$key should have been previously generated in a cryptographically safe way, like openssl_random_pseudo_bytes
    // $key = "3ALJJ3aOyT";
    // $plaintext = "message to be encrypted";
    // $cipher = "aes-128-gcm";
    // if (in_array($cipher, openssl_get_cipher_methods()))
    // {
    //     $ivlen = openssl_cipher_iv_length($cipher);
    //     $iv = openssl_random_pseudo_bytes($ivlen);
    //     $ciphertext = openssl_encrypt($plaintext, $cipher, $key, $options=0, $iv, $tag);
    //     echo $ciphertext."</br>";
    //     //store $cipher, $iv, and $tag for decryption later
    //     $original_plaintext = openssl_decrypt($ciphertext, $cipher, $key, $options=0, $iv, $tag);
    //     echo $original_plaintext."\n";
    // }

    
    
    

