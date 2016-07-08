<?php

// Load the DB Connection
include_once( 'cfg/config.php' );

$setup[ 1 ][ 'heroes' ] = 3;
$setup[ 1 ][ 'villians' ] = 4;
$setup[ 1 ][ 'henchmen' ] = 2;
$setup[ 1 ][ 'bystanders' ] = 12;

$setup[ 2 ][ 'heroes' ] = 5;
$setup[ 2 ][ 'villians' ] = 2;
$setup[ 2 ][ 'henchmen' ] = 1;
$setup[ 2 ][ 'bystanders' ] = 2;

$setup[ 3 ][ 'heroes' ] = 5;
$setup[ 3 ][ 'villians' ] = 3;
$setup[ 3 ][ 'henchmen' ] = 1;
$setup[ 3 ][ 'bystanders' ] = 8;

$setup[ 4 ][ 'heroes' ] = 5;
$setup[ 4 ][ 'villians' ] = 3;
$setup[ 4 ][ 'henchmen' ] = 2;
$setup[ 4 ][ 'bystanders' ] = 8;


$setup[ 5 ][ 'heroes' ] = 5;
$setup[ 5 ][ 'villians' ] = 4;
$setup[ 5 ][ 'henchmen' ] = 2;
$setup[ 5 ][ 'bystanders' ] = 12;

/*
	Run a query
*/
function runQuery( $sql ) {
	// Database Settings
	$host = '127.0.0.1';
	$user = 'legendary';
	$password = 'nailPOLISH%%';
	$database = 'legendary';
/*
	$host = 'localhost';
	$user = 'legendary';
	$password = 'nailPOLISH%%';
	$database = 'legendary';
*/
	// Connect to the DB
	$db = new mysqli( $host, $user, $password, $database, '33067' );

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

	if ( !$result = $db->query( $sql ) ) {
		// Oh no! The query failed. 
		echo "Sorry, the website is experiencing problems.";

		// Again, do not do this on a public site, but we'll show you how
		// to get the error information
		echo "Error: Our query failed to execute: \n";
		echo "Query: " . $sql . "\n";
		echo "Errno: " . $db->errno . "\n";
		echo "Error: " . $db->error . "\n";
		exit;
	} 	

	// Close the DB connection
	$db->close();

	// Return our results
	return $result;
}


/*
	Turns an array into a string so we can SQL over it
*/
function stringify( $array ) {
	// Set up a string to hold our JSON we need to edit
	$temp = '';

	// Loop through all of the expansions in the array
	foreach( $array as $value ) {
		// Smash this expansion onto the end of our string
		$temp .= $value . ',';
	}

	// Remove the ending commma
	return trim( $temp, ',' );
}