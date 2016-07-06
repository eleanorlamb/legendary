<?php
// Database Settings
$host = '127.0.0.1:33067';
$user = 'root';
$password = '';
$database = 'legendary';

// Connect to the DB
$db = new mysqli( $host, $user, $password, $database );

// Oh no! A connect_errno exists so the connection attempt failed!
if ($db->connect_errno) {
    // The connection failed. What do you want to do? 
    // You could contact yourself (email?), log the error, show a nice page, etc.
    // You do not want to reveal sensitive information

    // Let's try this:
    echo "Sorry, this website is experiencing problems.";

    // Something you should not do on a public site, but this example will show you
    // anyways, is print out MySQL error related information -- you might log this
    echo "Error: Failed to make a MySQL connection: \n";
    echo "Errno: " . $db->connect_errno . "\n";
    echo "Error: " . $db->connect_error . "\n";
    
    // You might want to show them something nice, but we will simply exit
    exit;
}
