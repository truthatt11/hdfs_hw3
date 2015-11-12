<?php

system('whoami');
$var = $_POST["username"];
echo "<br>";
echo $var;

$servername = "localhost";
$username = $_POST["username"];
$password = $_POST["password"];
/*
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
*/
?> 
