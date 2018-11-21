<?php
/*
 * Jan Salceda 0313887
 * November 5, 2018
 */
    ob_start();
    session_start();
    //include 'server.php';
    //Contents for DB user and password
    //Allows for user to connect you database

    define('DB_DSN','mysql:host=localhost;dbname=serverside;charset=utf8');
    define('DB_USER','serveruser');
    define('DB_PASS','gorgonzola7!');

    $db = new PDO(DB_DSN, DB_USER, DB_PASS); 
    
    include('class.user.php');
    $user = new User($db);
?>