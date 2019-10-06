<?php
session_start();

require_once __DIR__."/config.php";

// Connect to the database
$db = new mysqli(
        $config['database']['host'],
        $config['database']['user'],
        $config['database']['password'],
        $config['database']['database'],
        $config['database']['port']
);

// Showing an error if not connected to database
if($db->connect_error){
    die("Connection failed: " . $db->connect_error);
}

// Checking the logged user credentials
$user = null;


// If remember me unchecked on login
if(isset($_SESSION['user_id'])){

    $user_id = $_SESSION['user_id'];

    // Getting the user details from the database
    $query = $db->query("SELECT * FROM users WHERE u_id=$user_id ; ");
    if($query){
        $user= $query->fetch_assoc();
        if(!$user){
            // Destroying the session if invalid credentials
            session_destroy();
        }
    }

    // Remember me ticked
} else if(isset($_COOKIE['remember_token'])){

    $remember_token = $_COOKIE['remember_token'];

    $user= $db->query("SELECT * FROM users WHERE u_remember_token='$remember_token' LIMIT 1")->fetch_assoc();

    if(!$user){
        // Destroying the cookie
        $_COOKIE['remember_token'] = null;
    }
}

