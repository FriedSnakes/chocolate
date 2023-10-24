<?php
//This is your Database connection file. You may use this file or create your own.
//Never code your normal user name and password into your database connection file.
//Keep the password contained in this file private.

$conn = new mysqli('localhost', '_team23L2B', 'zLHt6pioEvoD18uk', 'team23L2B_reviews');
if($conn->connect_error){
	die("Error Connecting to Database: " . $conn->connect_error);
}
?>
