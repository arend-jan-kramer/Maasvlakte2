<?php
$servername="localhost";
$username="root";
$password="";
$database="db18256_pr9msvlkt";

$connectionActive = false;


// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

?>